<?php
/**
 * Created by PhpStorm.
 * User: verner
 * Date: 15.01.17
 * Time: 22:21
 */

namespace app\controllers;

use app\models\Auto;
use app\models\AutoForm;
use app\models\AutoSearch;
use app\models\PasswordForm;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class AccountController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'edit', 'password', 'autos', 'auto', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'edit', 'password', 'autos', 'auto', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'filled' => (
                \Yii::$app->user->identity->first_name &&
                \Yii::$app->user->identity->last_name &&
                \Yii::$app->user->identity->patronymic
            )
        ]);
    }

    public function actionEdit()
    {
        $model = User::findIdentity(\Yii::$app->user->id);

        $saved = false;
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $saved = true;
        }

        return $this->render('edit', [
            'model' => $model,
            'saved' => $saved
        ]);
    }

    public function actionPassword()
    {
        $model = new PasswordForm();

        $saved = false;
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $saved = true;
        }

        return $this->render('password', [
            'model' => $model,
            'saved' => $saved
        ]);
    }

    public function actionAutos()
    {
        $searchModel = new AutoSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams, \Yii::$app->user->identity->id);

        $dataProvider->pagination = [
            'pageSize' => 10
        ];
        $dataProvider->sort = [
            'defaultOrder' => [
                'brand' => SORT_ASC,
                'model' => SORT_ASC,
            ]
        ];

        return $this->render('autos', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionAuto()
    {
        $model = new AutoForm();

        if ($model->load(\Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model, 'image');

            if ($imageId = $model->upload()) {
                $auto = new Auto();
                $auto->brand = $model->brand;
                $auto->model = $model->model;
                $auto->modification = $model->modification;
                $auto->year = $model->year;
                $auto->mileage = $model->mileage;
                $auto->image = $imageId;
                $auto->user_id = \Yii::$app->user->identity->id;

                if ($auto->validate() && $auto->save()) {
                    $this->redirect(Url::toRoute('account/autos'));
                }
                else
                    $model->addError('brand', 'An error occurred while saving data');
            }
            else
                $model->addError('image', 'An error occurred while uploading the file');
        }

        return $this->render('auto', [
            'model' => $model
        ]);
    }

    public function actionDelete()
    {
        if ($id = \Yii::$app->request->get('id')) {
            $model = Auto::findOne($id);
            if ($model && $model->user_id == \Yii::$app->user->identity->id) {
                $model->delete();
                $this->redirect(Url::toRoute('account/autos'));
            }
        }
        else
            $this->goBack();
    }

}

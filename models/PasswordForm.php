<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PasswordForm extends Model
{
    public $password1;
    public $password2;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password1', 'password2'], 'required'],
            [['password1', 'password2'], 'trim'],
            ['password1', 'string', 'length' => [6, 10]],
            ['password2', 'compare', 'compareAttribute' => 'password1'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password1' => 'Password',
            'password2' => 'Repeat password'
        ];
    }

    public function save()
    {
        $model = User::findOne(Yii::$app->user->identity->id);

        $model->password = md5($this->password1);
        $model->save();
    }

}

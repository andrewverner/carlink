<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auto".
 *
 * @property integer $id
 * @property string $brand
 * @property string $model
 * @property string $modification
 * @property integer $year
 * @property integer $mileage
 * @property integer $image
 * @property integer $user_id
 */
class Auto extends \yii\db\ActiveRecord
{

    private $_image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'modification', 'year', 'mileage', 'user_id'], 'required'],
            [['year', 'mileage', 'image', 'user_id'], 'integer'],
            [['brand', 'model', 'modification'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'model' => 'Model',
            'modification' => 'Modification',
            'year' => 'Year',
            'mileage' => 'Mileage',
            'image' => 'Image',
            'user_id' => 'User ID',
        ];
    }

    public function upload()
    {

    }

}

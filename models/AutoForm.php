<?php

namespace app\models;

use Yii;
use yii\base\Model;

class AutoForm extends Model
{
    public $brand;
    public $model;
    public $modification;
    public $year;
    public $mileage;
    public $image;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['brand', 'model', 'modification', 'year', 'mileage'], 'required'],
            [['brand', 'model', 'modification', 'year', 'mileage'], 'trim'],
            [['brand', 'model', 'modification'], 'string', 'length' => [1, 45]],
            [['year', 'mileage'], 'integer'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'brand' => 'Brand',
            'model' => 'Model',
            'modification' => 'Modification',
            'year' => 'Year',
            'mileage' => 'Mileage',
            'image' => 'Image'
        ];
    }

    public function upload()
    {
        if ($this->image->saveAs(Yii::$app->basePath . "/web/uploads/{$this->image->baseName}.{$this->image->extension}")) {
            $image = new Image();
            $image->name = "{$this->image->baseName}.{$this->image->extension}";
            $image->path = 'uploads/';
            $image->save();

            return $image->id;
        }
        else
            return false;
    }

}

<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password1;
    public $password2;
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password1', 'password2', 'email'], 'required'],
            [['username', 'password1', 'password2', 'email'], 'trim'],
            ['email', 'email'],
            ['password1', 'string', 'length' => [6, 10]],
            ['email', 'string', 'length' => [6, 45]],
            [['username', 'email'], 'uniqueCheck'],
            ['password2', 'compare', 'compareAttribute' => 'password1'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'User name',
            'email' => 'Email',
            'password1' => 'Password',
            'password2' => 'Repeat password'
        ];
    }

    public function uniqueCheck($attribute)
    {
        if (User::findOne([$attribute => $this->{$attribute}]))
            $this->addError($attribute, 'This '. $this->attributeLabels()[$attribute] . ' is used by someone else');
    }

}

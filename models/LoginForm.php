<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required']
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $this->_user = User::findOne([
                'username' => $this->username,
                'password' => md5($this->password)
            ]);

            if ($this->_user) {
                return Yii::$app->user->login($this->_user, 0);
            }
            else
                $this->addError('username', 'Incorrect credentials');
        }

        return false;
    }

}

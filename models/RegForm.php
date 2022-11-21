<?php
namespace app\models;

use yii\base\Model;

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            [['username', 'email', 'password'], 'required'],
            ['username', 'string', 'min' => 2, 'max' => 50],
            ['password', 'string', 'min' => 6, 'max' => 50],
            ['username', 'unique',
                'targetClass' => User::class,
                'message' => 'Это имя уже занято.'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::class,
                'message' => 'Эта почта уже занята.'],
            ['confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false,
                'message' => 'Пароли не совпадают'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'e-mail',
            'password' => 'Пароль',
            'confirm' => 'Повторите пароль'
        ];
    }

    public function reg()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at = date('Y-m-d H:i:s');

        return $user->save() ? $user : null;
    }
}

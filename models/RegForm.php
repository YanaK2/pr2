<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;



class RegForm extends User
{
 public $confirm_password;
 public $agree;
 public function rules()
 {
    return [
        [['name', 'surname', 'login', 'email', 'password', 'confirm_password','agree'], 'required'],
        [['name', 'surname', 'patronymic'], 'match', 'pattern'=>'/[А-Яёа-яё\s]{1,}/u','message'=>'Используйте русские буквы'],
        [['password'], 'match', 'pattern'=>'/^[A-Za-z0-9]{5,}/u', 'message'=>'Используйте минимум 5 латинских букв и цифр'],
        [['email'], 'email'],
        [['confirm_password'], 'compare','compareAttribute'=>'password'],
        [['login', 'email'], 'unique'],
        [['login'], 'match', 'pattern'=>'/^[A-Za-z]{3,}/u', 'message'=>'Используйте минимум 2 латинских буквы '],
        [['agree'], 'compare', 'compareValue'=>true,'message'=>''],
        [['is_admin'], 'integer'],
        [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 200],
    

 ];
 }
 /**
 * {@inheritdoc}
 */
 public function attributeLabels()
 {

    return [
        //'id_user' => 'Id User',
        'name' => 'Имя',
        'surname' => 'Фамилия',
        'patronymic' => 'Отчество',
        'login' => 'Логин',
        'email' => 'Почта',
        'password' => 'Пароль',
        'confirm_password' => 'Повторите пароль',
        'agree' => 'Согласие на обработку персональных данных',
        //'is_admin' => 'Is Admin',

 ];
 }
}

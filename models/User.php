<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $is_admin
 *
 * @property Claim[] $claims
 */
class User extends ActiveRecord implements IdentityInterface
{ 
    public static function findIdentity($id_user)
    {
        return static::findOne($id_user);
    }

    public static function findIdentityByAccessToken($token, $type = null)
     {
     return static::findOne(['access_token' => $token]);
     }
    

     public function validateAuthKey($authKey)
     {
     return ;
     }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return self::find()->where(['login'=> $login])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'password'], 'required'],
            [['is_admin'], 'integer'],
            [['login', 'email'], 'unique'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'name' => '??????',
            'surname' => '??????????????',
            'patronymic' => '????????????????',
            'login' => '??????????',
            'email' => '??????????',
            'password' => '????????????',
            //'is_admin' => 'Is Admin',
        ];
    }

    /**
     * Gets query for [[Claims]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClaims()
    {
        return $this->hasMany(Claim::class, ['id_user' => 'id_user']);
    }
}

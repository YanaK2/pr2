<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "claim".
 *
 * @property int $id_claim
 * @property int $id_user
 * @property string $name
 * @property string $discr
 * @property int $id_cat
 * @property string $photobefore
 * @property string $time
 * @property string $status
 * @property string|null $photoafter
 *
 * @property Category $cat
 * @property User $user
 */
class Claim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'claim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'discr', 'id_cat', 'photobefore'], 'required'],
            [['id_user', 'id_cat'], 'integer'],
            [['time'], 'safe'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['discr', 'photobefore', 'photoafter'], 'string', 'max' => 300],
            [['id_cat'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_cat' => 'id_cat']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id_claim' => 'Id Claim',
            //'id_user' => 'Id User',
            'name' => 'Название',
            'discr' => 'Описание',
            'id_cat' => 'Категория',
            'photobefore' => 'Фото проблемы',
            'time' => 'Время подачи заявки',
            'status' => 'Статус',
            'photoafter' => 'Фото результата',
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::class, ['id_cat' => 'id_cat']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'id_user']);
    }
}

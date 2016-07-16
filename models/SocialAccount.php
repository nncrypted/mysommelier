<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "social_account".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $provider
 * @property string $client_id
 * @property string $data
 *
 * @property User $user
 */
class SocialAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'social_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['provider', 'client_id'], 'required'],
            [['data'], 'string'],
            [['provider', 'client_id'], 'string', 'max' => 255],
            [['provider', 'client_id'], 'unique', 'targetAttribute' => ['provider', 'client_id'], 'message' => 'The combination of Provider and Client ID has already been taken.'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'provider' => 'Provider',
            'client_id' => 'Client ID',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

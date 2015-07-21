<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $wine_id
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Wines $wine
 * @property User $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'wine_id', 'comment'], 'required'],
            [['user_id', 'wine_id', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string']
        ];
    }

	/**
     * @inheritdoc
     */
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'wine_id' => 'Wine',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWine()
    {
        return $this->hasOne(Wines::className(), ['id' => 'wine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cellarusers".
 *
 * @property integer $cellar_id
 * @property integer $user_id
 * @property string $permission
 *
 * @property Cellars $cellar
 * @property User $user
 */
class Cellarusers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cellarusers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cellar_id', 'user_id'], 'required'],
            [['cellar_id', 'user_id'], 'integer'],
            [['permission'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cellar_id' => 'Cellar',
            'user_id' => 'User',
            'permission' => 'Permission',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellar()
    {
        return $this->hasOne(Cellars::className(), ['id' => 'cellar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

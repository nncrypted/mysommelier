<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cellarusers".
 *
 * @property integer $id
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
            [['permission'], 'string', 'max' => 10],
            [['cellar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cellars::className(), 'targetAttribute' => ['cellar_id' => 'id']],
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
            'cellar_id' => 'Cellar ID',
            'user_id' => 'User ID',
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

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_config".
 *
 * @property integer $id
 * @property integer $wotd_id
 * @property string $wotd_dt
 */
class AppConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wotd_id', 'wotd_dt'], 'required'],
            [['id', 'wotd_id'], 'integer'],
            [['wotd_dt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wotd_id' => 'Wotd ID',
            'wotd_dt' => 'Wotd Dt',
        ];
    }
}

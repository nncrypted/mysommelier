<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appellations".
 *
 * @property integer $id
 * @property string $country
 * @property integer $region_id
 * @property string $appellation
 * @property string $common_flg
 *
 * @property Regions $region
 * @property Wineries[] $wineries
 * @property Wines[] $wines
 */
class Appellations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appellations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'region_id', 'appellation'], 'required'],
            [['region_id'], 'integer'],
            [['country', 'appellation'], 'string', 'max' => 45],
            [['common_flg'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'region_id' => 'Region',
            'appellation' => 'Appellation',
            'common_flg' => 'Common?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWineries()
    {
        return $this->hasMany(Wineries::className(), ['default_appellation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWines()
    {
        return $this->hasMany(Wines::className(), ['appellation_id' => 'id']);
    }
}

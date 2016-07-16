<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appellations".
 *
 * @property integer $id
 * @property string $country
 * @property integer $region_id
 * @property string $app_name
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
            [['country', 'region_id', 'app_name'], 'required'],
            [['region_id'], 'integer'],
            [['country', 'app_name'], 'string', 'max' => 45],
            [['common_flg'], 'string', 'max' => 1],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
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
            'region_id' => 'Region ID',
            'app_name' => 'Appellation',
            'common_flg' => 'Common Flg',
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

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property integer $id
 * @property string $region_name
 * @property string $country
 *
 * @property Appellations[] $appellations
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_name', 'country'], 'required'],
            [['region_name'], 'string', 'max' => 100],
            [['country'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_name' => 'Region',
            'country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppellations()
    {
        return $this->hasMany(Appellations::className(), ['region_id' => 'id']);
    }
}

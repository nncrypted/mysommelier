<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property integer $cellar_loc_id
 * @property integer $cellar_id
 * @property string $location
 *
 * @property Cellarwines[] $cellarwines
 * @property Cellars $cellar
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cellar_loc_id', 'cellar_id', 'location'], 'required'],
            [['cellar_loc_id', 'cellar_id'], 'integer'],
            [['location'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cellar_loc_id' => 'Cellar Location',
            'cellar_id' => 'Cellar',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellarwines()
    {
        return $this->hasMany(Cellarwines::className(), ['cellar_loc_id' => 'cellar_loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellar()
    {
        return $this->hasOne(Cellars::className(), ['id' => 'cellar_id']);
    }
}

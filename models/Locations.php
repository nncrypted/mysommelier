<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property integer $id
 * @property integer $cellar_id
 * @property string $loc_name
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
            [['id', 'cellar_id', 'loc_name'], 'required'],
            [['id', 'cellar_id'], 'integer'],
            [['loc_name'], 'string', 'max' => 25],
            [['cellar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cellars::className(), 'targetAttribute' => ['cellar_id' => 'id']],
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
            'loc_name' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellarwines()
    {
        return $this->hasMany(Cellarwines::className(), ['cellar_loc_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellar()
    {
        return $this->hasOne(Cellars::className(), ['id' => 'cellar_id']);
    }
}

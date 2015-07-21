<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cellarwines".
 *
 * @property integer $id
 * @property integer $cellar_id
 * @property integer $wine_id
 * @property integer $quantity
 * @property integer $rating
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $cost
 * @property integer $cellar_loc_id
 *
 * @property Cellars $cellar
 * @property Wines $wine
 * @property Locations $cellarLoc
 */
class Cellarwines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cellarwines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cellar_id', 'wine_id', 'quantity', 'cellar_loc_id'], 'required'],
            [['cellar_id', 'wine_id', 'quantity', 'rating', 'created_at', 'updated_at', 'cellar_loc_id'], 'integer'],
            [['cost'], 'number']
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
            'cellar_id' => 'Cellar',
            'wine_id' => 'Wine',
            'quantity' => 'Quantity',
            'rating' => 'Rating',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cost' => 'Cost',
            'cellar_loc_id' => 'Cellar Location',
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
    public function getWine()
    {
        return $this->hasOne(Wines::className(), ['id' => 'wine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellarLoc()
    {
        return $this->hasOne(Locations::className(), ['cellar_loc_id' => 'cellar_loc_id']);
    }
}

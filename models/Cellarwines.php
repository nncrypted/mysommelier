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
            [['cost'], 'number'],
            [['cellar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cellars::className(), 'targetAttribute' => ['cellar_id' => 'id']],
            [['wine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wines::className(), 'targetAttribute' => ['wine_id' => 'id']],
            [['cellar_loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['cellar_loc_id' => 'id']],
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
            'cellar_id' => 'Cellar ID',
            'wine_id' => 'Wine ID',
            'quantity' => 'Quantity',
            'rating' => 'Rating',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cost' => 'Cost',
            'cellar_loc_id' => 'Cellar Loc ID',
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
        return $this->hasOne(Locations::className(), ['id' => 'cellar_loc_id']);
    }
}

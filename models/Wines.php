<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "wines".
 *
 * @property integer $id
 * @property string $wine_name
 * @property integer $winery_id
 * @property integer $appellation_id
 * @property string $wine_year
 * @property integer $wine_varietal_id
 * @property string $bottle_size
 * @property string $upc_barcode
 * @property string $description
 * @property integer $overall_rating
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cellarwines[] $cellarwines
 * @property Comments[] $comments
 * @property Orders[] $orders
 * @property Varietals $wineVarietal
 * @property Appellations $appellation
 * @property Wineries $winery
 */
class Wines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wine_name', 'winery_id', 'appellation_id', 'wine_year', 'wine_varietal_id', 'bottle_size'], 'required'],
            [['winery_id', 'appellation_id', 'wine_varietal_id', 'overall_rating', 'created_at', 'updated_at'], 'integer'],
            [['wine_name'], 'string', 'max' => 45],
            [['wine_year'], 'string', 'max' => 4],
            [['bottle_size'], 'string', 'max' => 15],
            [['upc_barcode'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 255]
        ];
    }

	/**
     * @inheritdoc
     */
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
			],
			'fileBehavior' => [
				'class' => \nemmo\attachments\behaviors\FileBehavior::className()
			]
		];
	}

	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wine_name' => 'Wine Name',
            'winery_id' => 'Winery',
            'appellation_id' => 'Appellation',
            'wine_year' => 'Wine Year',
            'wine_varietal_id' => 'Varietal',
            'bottle_size' => 'Bottle Size',
            'upc_barcode' => 'Upc Barcode',
            'description' => 'Description',
            'overall_rating' => 'Overall Rating',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return	a wine CA record with a random wine selected with an overall 
	 *			rating of $min_rating or greater
     */
    public function getRandomWine($min_rating)
    {
        $wineIDList = (new \yii\db\query())
                ->select(['id'])
                ->from('wines')
                ->all();
        
        $wineID = $wineIDList[rand(0, (sizeOf($wineIDList) - 1))];
		$wotd = Wines::findOne($wineID);

		if (!isset($wotd))
		{
			return NULL;
		}
		else
		{
			return $wotd;
		}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellarwines()
    {
        return $this->hasMany(Cellarwines::className(), ['wine_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['wine_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['wine_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWineVarietal()
    {
        return $this->hasOne(Varietals::className(), ['id' => 'wine_varietal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppellation()
    {
        return $this->hasOne(Appellations::className(), ['id' => 'appellation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWinery()
    {
        return $this->hasOne(Wineries::className(), ['id' => 'winery_id']);
    }
}

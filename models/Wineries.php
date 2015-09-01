<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "wineries".
 *
 * @property integer $id
 * @property string $winery_name
 * @property integer $default_appellation_id
 * @property string $phone
 * @property string $proprietor_name
 * @property string $winemaker_name
 * @property string $website
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Appellations $defaultAppellation
 * @property Wines[] $wines
 */
class Wineries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wineries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['winery_name'], 'required'],
            [['default_appellation_id', 'created_at', 'updated_at'], 'integer'],
            [['winery_name', 'proprietor_name', 'winemaker_name'], 'string', 'max' => 45],
            [['phone'], 'string', 'max' => 12],
            [['website'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 255],
            [['default_appellation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appellations::className(), 'targetAttribute' => ['default_appellation_id' => 'id']],
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
            'winery_name' => 'Winery Name',
            'default_appellation_id' => 'Default Appellation ID',
            'phone' => 'Phone',
            'proprietor_name' => 'Proprietor Name',
            'winemaker_name' => 'Winemaker Name',
            'website' => 'Website',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultAppellation()
    {
        return $this->hasOne(Appellations::className(), ['id' => 'default_appellation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWines()
    {
        return $this->hasMany(Wines::className(), ['winery_id' => 'id']);
    }
}

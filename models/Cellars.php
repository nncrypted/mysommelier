<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cellars".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property string $cellar_name
 * @property integer $created_at
 * @property integer $default_cellar_loc_id
 *
 * @property User $owner
 * @property Cellarusers[] $cellarusers
 * @property Cellarwines[] $cellarwines
 * @property Locations[] $locations
 */
class Cellars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cellars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'cellar_name'], 'required'],
            [['owner_id', 'created_at', 'default_cellar_loc_id'], 'integer'],
            [['cellar_name'], 'string', 'max' => 45]
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
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => FALSE,
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
            'owner_id' => 'Owner',
            'cellar_name' => 'Cellar Name',
            'created_at' => 'Created At',
            'default_cellar_loc_id' => 'Default Cellar Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellarusers()
    {
        return $this->hasMany(Cellarusers::className(), ['cellar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCellarwines()
    {
        return $this->hasMany(Cellarwines::className(), ['cellar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Locations::className(), ['cellar_id' => 'id']);
    }
}

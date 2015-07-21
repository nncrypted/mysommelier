<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "varietals".
 *
 * @property integer $id
 * @property string $name
 * @property string $common_flg
 * @property string $varietal_type
 * @property string $description
 *
 * @property Wines[] $wines
 */
class Varietals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'varietals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'common_flg'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['common_flg'], 'string', 'max' => 1],
            [['varietal_type'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'common_flg' => 'Common?',
            'varietal_type' => 'Varietal Type',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWines()
    {
        return $this->hasMany(Wines::className(), ['wine_varietal_id' => 'id']);
    }
}

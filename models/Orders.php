<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $order_id
 * @property integer $qty
 * @property string $price_per_unit
 * @property integer $wine_id
 * @property integer $user_id
 * @property string $order_dt
 * @property string $ordered_from
 * @property string $futures_flg
 * @property string $exp_delivery_dt
 * @property string $delivery_location
 *
 * @property Wines $wine
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qty', 'price_per_unit', 'wine_id', 'user_id', 'order_dt'], 'required'],
            [['qty', 'wine_id', 'user_id'], 'integer'],
            [['price_per_unit'], 'number'],
            [['order_dt', 'exp_delivery_dt'], 'safe'],
            [['ordered_from', 'delivery_location'], 'string', 'max' => 45],
            [['futures_flg'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order',
            'qty' => 'Qty',
            'price_per_unit' => 'Price',
            'wine_id' => 'Wine',
            'user_id' => 'User',
            'order_dt' => 'Order Date',
            'ordered_from' => 'Ordered From',
            'futures_flg' => 'Futures Flag',
            'exp_delivery_dt' => 'Exp Delivery Date',
            'delivery_location' => 'Delivery Location',
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

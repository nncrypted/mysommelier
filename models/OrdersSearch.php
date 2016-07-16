<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    public function rules()
    {
        return [
            [['id', 'qty', 'wine_id', 'user_id'], 'integer'],
            [['price_per_unit'], 'number'],
            [['order_dt', 'ordered_from', 'futures_flg', 'exp_delivery_dt', 'delivery_location'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Orders::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'exp_delivery_dt' => SORT_DESC,
				],
			],
			'pagination' => [
				'pageSize' => 100,
			],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'qty' => $this->qty,
            'price_per_unit' => $this->price_per_unit,
            'wine_id' => $this->wine_id,
            'user_id' => $this->user_id,
            'order_dt' => $this->order_dt,
            'exp_delivery_dt' => $this->exp_delivery_dt,
        ]);

        $query->andFilterWhere(['like', 'ordered_from', $this->ordered_from])
            ->andFilterWhere(['like', 'futures_flg', $this->futures_flg])
            ->andFilterWhere(['like', 'delivery_location', $this->delivery_location]);

        return $dataProvider;
    }
}

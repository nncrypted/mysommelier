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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'qty', 'wine_id', 'user_id'], 'integer'],
            [['price_per_unit'], 'number'],
            [['order_dt', 'ordered_from', 'futures_flg', 'exp_delivery_dt', 'delivery_location'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'order_id' => $this->order_id,
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

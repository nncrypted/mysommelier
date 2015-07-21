<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wines;

/**
 * WinesSearch represents the model behind the search form about `app\models\Wines`.
 */
class WinesSearch extends Wines
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'winery_id', 'appellation_id', 'wine_varietal_id', 'overall_rating', 'created_at', 'updated_at'], 'integer'],
            [['wine_name', 'wine_year', 'bottle_size', 'upc_barcode', 'description'], 'safe'],
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
        $query = Wines::find();

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
            'id' => $this->id,
            'winery_id' => $this->winery_id,
            'appellation_id' => $this->appellation_id,
            'wine_varietal_id' => $this->wine_varietal_id,
            'overall_rating' => $this->overall_rating,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'wine_name', $this->wine_name])
            ->andFilterWhere(['like', 'wine_year', $this->wine_year])
            ->andFilterWhere(['like', 'bottle_size', $this->bottle_size])
            ->andFilterWhere(['like', 'upc_barcode', $this->upc_barcode])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

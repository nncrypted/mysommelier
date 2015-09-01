<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cellarwines;

/**
 * CellarwinesSearch represents the model behind the search form about `app\models\Cellarwines`.
 */
class CellarwinesSearch extends Cellarwines
{
	public $wine_year;
	public $loc_name;
	public $winery_name;

	public function rules()
    {
        return [
            [['id', 'cellar_id', 'wine_id', 'quantity', 'rating', 'created_at', 'updated_at', 'cellar_loc_id'], 'integer'],
            [['cost'], 'number'],
			[['wine_year', 'loc_name', 'winery_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Cellarwines::find();
		$query->joinWith(['cellar','wine','cellarLoc','wine.winery','wine.wineVarietal']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
				'attributes' => [
					'cellar_name' => [
						'asc' => ['cellar_name' => SORT_ASC],
						'desc' => ['cellar_name' => SORT_DESC],
					],
					'loc_name' => [
						'asc' => ['loc_name' => SORT_ASC],
						'desc' => ['loc_name' => SORT_DESC],
					],
					'winery_name' => [
						'asc' => ['winery_name' => SORT_ASC],
						'desc' => ['winery_name' => SORT_DESC],
					],
					'wine_name' => [
						'asc' => ['wine_name' => SORT_ASC],
						'desc' => ['wine_name' => SORT_DESC],
					],
					'wine_year' => [
						'asc' => ['wine_year' => SORT_ASC],
						'desc' => ['wine_year' => SORT_DESC],
					],
					'varietal_name' => [
						'asc' => ['varietal_name' => SORT_ASC],
						'desc' => ['varietal_name' => SORT_DESC],
					],
				],
			],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cellar_id' => $this->cellar_id,
            'wine_id' => $this->wine_id,
            'quantity' => $this->quantity,
            'rating' => $this->rating,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cost' => $this->cost,
            'cellar_loc_id' => $this->cellar_loc_id,
        ])
		->andFilterWhere(['like', 'locations.loc_name', $this->loc_name])
		->andFilterWhere(['like', 'wineries.winery_name', $this->winery_name])
		->andFilterWhere(['like', 'wines.wine_year', $this->wine_year]);

        return $dataProvider;
    }
}

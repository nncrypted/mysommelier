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
	public $wine_year;
	public $app_name;
	public $winery_name;

	public function rules()
    {
        return [
            [['id', 'winery_id', 'appellation_id', 'wine_varietal_id', 'overall_rating', 'created_at', 'updated_at'], 'integer'],
            [['winery_name','wine_name', 'wine_year', 'bottle_size', 'upc_barcode', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Wines::find();
		$query->joinWith(['winery','wineVarietal','appellation']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
				'pageSize' => 100,
			],
			'sort' => [
				'attributes' => [
					'winery_name' => [
						'asc' => ['winery_name' => SORT_ASC],
						'desc' => ['winery_name' => SORT_DESC],
					],
					'wine_year' => [
						'asc' => ['wine_year' => SORT_ASC],
						'desc' => ['wine_year' => SORT_DESC],
					],
					'varietal_name' => [
						'asc' => ['varietal_name' => SORT_ASC],
						'desc' => ['varietal_name' => SORT_DESC],
					],
					'wine_name' => [
						'asc' => ['wine_name' => SORT_ASC],
						'desc' => ['wine_name' => SORT_DESC],
					],
					'bottle_size' => [
						'asc' => ['bottle_size' => SORT_ASC],
						'desc' => ['bottle_size' => SORT_DESC],
					],
					'overall_rating' => [
						'asc' => ['overall_rating' => SORT_ASC],
						'desc' => ['overall_rating' => SORT_DESC],
					],
				],
			],
        ]);

        if (!($this->load($params) && $this->validate())) {
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
            ->andFilterWhere(['like', 'description', $this->description])
			->andFilterWhere(['appellations.app_name' => $this->app_name])
			->andFilterWhere(['wineries.winery_name' => $this->winery_name]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wineries;

/**
 * WineriesSearch represents the model behind the search form about `app\models\Wineries`.
 */
class WineriesSearch extends Wineries
{
	public $country;
	public $app_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'default_appellation_id', 'created_at', 'updated_at'], 'integer'],
            [['winery_name', 'phone', 'proprietor_name', 'winemaker_name', 'website', 'description', 'country', 'app_name'], 'safe'],
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
        $query = Wineries::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'winery_name' => SORT_ASC,
                ],
				'attributes' => [
					'winery_name' => [
						'asc' => ['winery_name' => SORT_ASC],
						'desc' => ['winery_name' => SORT_DESC],
					],
					'website' => [
						'asc' => ['website' => SORT_ASC],
						'desc' => ['website' => SORT_DESC],
					],
					'app_name' => [
						'asc' => ['app_name' => SORT_ASC],
						'desc' => ['app_name' => SORT_DESC],
					],
					'country' => [
						'asc' => ['country' => SORT_ASC],
						'desc' => ['country' => SORT_DESC],
					],
					'phone' => [
						'asc' => ['phone' => SORT_ASC],
						'desc' => ['phone' => SORT_DESC],
					],
				],
			]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'default_appellation_id' => $this->default_appellation_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'winery_name', $this->winery_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'proprietor_name', $this->proprietor_name])
            ->andFilterWhere(['like', 'winemaker_name', $this->winemaker_name])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'app_name', $this->app_name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

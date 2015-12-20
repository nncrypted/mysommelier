<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Regions;

/**
 * RegionsSearch represents the model behind the search form about `app\models\Regions`.
 */
class RegionsSearch extends Regions
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['region_name', 'country'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Regions::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'country' => SORT_DESC,
					'region_name' => SORT_ASC,
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
        ]);

        $query->andFilterWhere(['like', 'region_name', $this->region_name])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}

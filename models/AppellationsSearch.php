<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appellations;

/**
 * AppellationsSearch represents the model behind the search form about `app\models\Appellations`.
 */
class AppellationsSearch extends Appellations
{
    public function rules()
    {
        return [
            [['id', 'region_id'], 'integer'],
            [['country', 'app_name', 'common_flg'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Appellations::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'country' => SORT_DESC,
					'region_id' => SORT_ASC,
					'app_name' => SORT_ASC,
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
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'app_name', $this->app_name])
            ->andFilterWhere(['like', 'common_flg', $this->common_flg]);

        return $dataProvider;
    }
}

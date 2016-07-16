<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Varietals;

/**
 * VarietalsSearch represents the model behind the search form about `app\models\Varietals`.
 */
class VarietalsSearch extends Varietals
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['varietal_name', 'common_flg', 'varietal_type', 'description'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Varietals::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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

        $query->andFilterWhere(['like', 'varietal_name', $this->varietal_name])
            ->andFilterWhere(['like', 'common_flg', $this->common_flg])
            ->andFilterWhere(['like', 'varietal_type', $this->varietal_type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

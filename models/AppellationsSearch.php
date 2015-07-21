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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region_id'], 'integer'],
            [['country', 'appellation', 'common_flg'], 'safe'],
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
        $query = Appellations::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'common_flg' => SORT_ASC,
                    'country' => SORT_ASC,
                    'appellation' => SORT_ASC
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'appellation', $this->appellation])
            ->andFilterWhere(['like', 'common_flg', $this->common_flg]);

        return $dataProvider;
    }
}

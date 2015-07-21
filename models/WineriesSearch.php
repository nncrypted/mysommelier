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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'default_appellation_id', 'created_at', 'updated_at'], 'integer'],
            [['winery_name', 'phone', 'proprietor_name', 'winemaker_name', 'website', 'description'], 'safe'],
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
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

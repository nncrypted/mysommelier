<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Locations;

/**
 * LocationsSearch represents the model behind the search form about `app\models\Locations`.
 */
class LocationsSearch extends Locations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cellar_loc_id', 'cellar_id'], 'integer'],
            [['location'], 'safe'],
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
        $query = Locations::find();

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
            'cellar_loc_id' => $this->cellar_loc_id,
            'cellar_id' => $this->cellar_id,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}

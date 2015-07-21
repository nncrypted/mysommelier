<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cellars;

/**
 * CellarsSearch represents the model behind the search form about `app\models\Cellars`.
 */
class CellarsSearch extends Cellars
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'owner_id', 'created_at', 'default_cellar_loc_id'], 'integer'],
            [['cellar_name'], 'safe'],
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
        $query = Cellars::find();

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
            'owner_id' => $this->owner_id,
            'created_at' => $this->created_at,
            'default_cellar_loc_id' => $this->default_cellar_loc_id,
        ]);

        $query->andFilterWhere(['like', 'cellar_name', $this->cellar_name]);

        return $dataProvider;
    }
}

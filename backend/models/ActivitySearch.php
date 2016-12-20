<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Activity;

/**
 * ActivitySearch represents the model behind the search form about `common\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vacants', 'capacity'], 'integer'],
            [['start_ts', 'start_place_name', 'start_place_map_url', 'end_ts', 'end_place_name', 'end_place_map_url'], 'safe'],
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
        $query = Activity::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        /*
        $query->andFilterWhere([
            'id' => $this->id,
            'valid_from' => $this->valid_from,
            'valid_until' => $this->valid_until,
            'is_for_rent' => $this->is_for_rent,
            'is_featured' => $this->is_featured,
        ]);

        $query->andFilterWhere(['like', 'our_reference', $this->our_reference])
            ->andFilterWhere(['like', 'their_reference', $this->their_reference]);
        */

        return $dataProvider;
    }
}

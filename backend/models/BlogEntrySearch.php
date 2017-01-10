<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BlogEntry;

/**
 * BlogEntrySearch represents the model behind the search form about `common\models\BlogEntry`.
 */
class BlogEntrySearch extends BlogEntry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'integer'],
            [['language_code', 'title', 'post_date'], 'safe'],
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
        $query = BlogEntry::find();

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

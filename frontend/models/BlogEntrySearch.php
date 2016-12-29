<?php

namespace frontend\models;

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
            [['id'], 'integer'],
            [['language_code', 'title', 'slug', 'post_date', 'post_year', 'post_month', 'post_day', 'author', 'lead_para'], 'safe'],
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
        $query = BlogEntry::find()->with();

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->addOrderBy('post_date desc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6
            ]
        ]);

        return $dataProvider;
    }
}

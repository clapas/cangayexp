<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offer;

/**
 * OfferSearch represents the model behind the search form about `common\models\Offer`.
 */
class OfferSearch extends Offer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['valid_from', 'valid_until', 'our_reference', 'their_reference'], 'safe'],
            [['is_for_rent', 'is_featured'], 'boolean'],
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
        $query = Offer::find()->with([
	    'offerFiles',
	    'offerTitles' => function($q) {
	        $q->asArray()->andWhere('language_code = :lang', [':lang' => Yii::$app->language]);
            },
	    'offerDescriptions' => function($q) {
	        $q->asArray()->andWhere('language_code = :lang', [':lang' => Yii::$app->language]);
            }
	]);
	//\yii\helpers\VarDumper::dump($query, 5, true); die;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'valid_from' => $this->valid_from,
            'valid_until' => $this->valid_until,
            'is_for_rent' => $this->is_for_rent,
            'is_featured' => $this->is_featured,
        ]);

        $query->andFilterWhere(['like', 'our_reference', $this->our_reference])
            ->andFilterWhere(['like', 'their_reference', $this->their_reference]);

        return $dataProvider;
    }
}


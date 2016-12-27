<?php

namespace frontend\models;

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
            [['id'], 'integer'],
            [['start_ts', 'end_ts', 'start_place_name', 'end_place_name'], 'safe'],
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
        $query = Activity::find()->with([
	    'files',
	    'titles' => function($q) {
	        $q->asArray()->andWhere('language_code = :lang and title != \'\' or title = \'\' and language_code = :slang', [':lang' => Yii::$app->language, ':slang' => Yii::$app->sourceLanguage]);
            },
	    'descriptions' => function($q) {
	        $q->asArray()->andWhere('language_code = :lang and description != \'\' or description = \'\' and language_code = :slang', [':lang' => Yii::$app->language, ':slang' => Yii::$app->sourceLanguage]);
            }
	]);
	//\yii\helpers\VarDumper::dump($query, 5, true); die;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->filterWhere([
            '>=', 'start_ts', $this->start_ts,
            //['like', 'title', $this->end_place_name]
        ]);

        return $dataProvider;
    }
}


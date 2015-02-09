<?php
namespace common\components;

use Yii;
use yii\base\ActionFilter;

use common\components\LanguageBootstrap;

class LanguageFilter extends ActionFilter {
    public function beforeAction($action) {
        if (isset(Yii::$app->request->queryParams['lang'])) {
            LanguageBootstrap::changeLanguage(Yii::$app->request->queryParams['lang']);
	}
        return parent::beforeAction($action);
    }
}

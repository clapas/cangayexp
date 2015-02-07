<?php
namespace common\components;

use Yii;
use yii\base\ActionFilter;

class LanguageFilter extends ActionFilter {
    public function beforeAction($action) {
        if (isset(Yii::$app->request->queryParams['lang'])) {
	    Yii::$app->language = Yii::$app->request->queryParams['lang'];
	    Yii::$app->urlManager->setBaseUrl(Yii::$app->urlManager->getBaseUrl() . '/' . Yii::$app->language);
	}
        return parent::beforeAction($action);
    }
}

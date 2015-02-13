<?php
namespace frontend\components;

use Yii;
use yii\base\ActionFilter;

use frontend\components\LanguageBootstrap;

class LanguageFilter extends ActionFilter {
    public function beforeAction($action) {
        if (isset(Yii::$app->request->queryParams['lang'])) {
            LanguageBootstrap::changeLanguage(Yii::$app->request->queryParams['lang']);
	    //Yii::$app->request->setQueryParams(['lang' => null]);
	    unset($_GET['lang']); // this is a hack!
	}
        return parent::beforeAction($action);
    }
}

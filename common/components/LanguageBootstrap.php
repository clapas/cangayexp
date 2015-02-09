<?php
namespace common\components;

use Yii;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

use common\models\Language;

class LanguageBootstrap implements BootstrapInterface {
    /**
    * Bootstrap method to be called during application bootstrap stage.
    * @param Application $app the application currently running
    */
    public function bootstrap($app) {
        $languages = ArrayHelper::map(Language::find()->all(), 'code', 'name');
        Yii::$app->params['languages'] = $languages;
        ArrayHelper::remove($languages, Yii::$app->sourceLanguage);
        $langPatt = implode(array_keys($languages), '|');
        Yii::$app->urlManager->addRules([
	    "<lang:({$langPatt})>/" => '/',
            "<lang:({$langPatt})>/<controller:\w+>/<action:\w+>" => '<controller>/<action>',
            "<lang:({$langPatt})>/<controller:\w+>/<action:\w+>/<id:\d+>" => '<controller>/<action>'
        ]);
    }
    public static function changeLanguage($lang) {
        Yii::$app->language = $lang;
	Yii::$app->urlManager->setBaseUrl(Yii::$app->urlManager->getBaseUrl() . '/' . $lang);
        Yii::$app->homeUrl = Yii::$app->homeUrl . $lang;
    }
    public static function hRefLang($url, $langCode) {
        $bUrl = Yii::$app->urlManager->getBaseUrl();
        if (Yii::$app->language == Yii::$app->sourceLanguage) {
	    if ($langCode != Yii::$app->sourceLanguage) $langCode .= '/';
            return $bUrl . '/' . $langCode . substr($url, strlen($bUrl) + 1);
	} else {
	    if ($langCode == Yii::$app->sourceLanguage) $langCode = '';
	    else $langCode = '/' . $langCode;
	    return substr($bUrl, 0, -3) . $langCode . substr($url, strlen($bUrl));
	}



	/*
        if ($langCode == Yii::$app->sourceLanguage) 
            return Yii::$app->urlManager->getBaseUrl()
                .substr($url, strpos($url, Yii::$app->urlManager->getBaseUrl()) . substr($url, -3
        echo $url; die;
        echo strpos($url, Yii::$app->urlManager->getBaseUrl()); die;
        return $url;
	*/
    }
}

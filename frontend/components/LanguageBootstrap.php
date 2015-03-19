<?php
namespace frontend\components;

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
            "<lang:({$langPatt})>/offer/view/<id:\d+>" => 'offer/view',
            'offer/view/<id:\d+>' => 'offer/view',
            "<lang:({$langPatt})>/offer/<location:\w+>/<offer_type:\w+>" => 'offer/index',
            "<lang:({$langPatt})>/offer/<location:\w*>" => 'offer/index',
            "<lang:({$langPatt})>/offer" => 'offer/index',
	    ['pattern' => "<lang:({$langPatt})>/", 'route' => 'site/index', 'suffix' => '/'],
            'offer/<location:\w+>/<offer_type:\w+>' => 'offer/index',
            'offer/<location:\w*>' => 'offer/index',
            'offer' => 'offer/index',
	    ['pattern' => '/', 'route' => 'site/index', 'suffix' => '/'],
            /*
            "<lang:({$langPatt})>/<controller:\w+>/<action:\w+>" => '<controller>/<action>',
            "<lang:({$langPatt})>/<controller:\w+>/<action:\w+>/<id:\d+>" => '<controller>/<action>',
            */
        ]);
    }
    public static function changeLanguage($lang) {
        Yii::$app->language = $lang;
	Yii::$app->urlManager->setBaseUrl(Yii::$app->urlManager->getBaseUrl() . '/' . $lang);
        if (Yii::$app->language != Yii::$app->sourceLanguage) $lang .= '/';
        Yii::$app->homeUrl = Yii::$app->homeUrl . $lang . '/';
    }
    /* hRefLang returns the URL for the $url passed as the first parameter but for the 
       $langCode passed as the second parameter.
     */
    public static function hRefLang($url, $langCode) {
        $bUrl = Yii::$app->urlManager->getBaseUrl();
        if (Yii::$app->language == Yii::$app->sourceLanguage) {
	    if ($langCode != Yii::$app->sourceLanguage and strlen(substr($url, strlen($bUrl) + 1)) > 1) $langCode .= '/';
            return $bUrl . '/' . $langCode . '/' . substr($url, strlen($bUrl) + 1);
	} else {
	    if ($langCode == Yii::$app->sourceLanguage) $langCode = '';
	    else $langCode = '/' . $langCode;
	    return substr($bUrl, 0, -3) . $langCode . substr($url, strlen($bUrl));
	}
    }
}

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
            "<lang:({$langPatt})>/activity/view/<id:\d+>" => 'activity/view',
            'activity/view/<id:\d+>' => 'activity/view',
            "<lang:({$langPatt})>/activity/<location:\w+>/<activity_type:\w+>" => 'activity/index',
            "<lang:({$langPatt})>/activity/<location:\w*>" => 'activity/index',
            "<lang:({$langPatt})>/activity" => 'activity/index',
	    ['pattern' => "<lang:({$langPatt})>/", 'route' => 'site/index', 'suffix' => '/'],
            'activity/<location:\w+>/<activity_type:\w+>' => 'activity/index',
            'activity/<location:\w*>' => 'activity/index',
            "<lang:({$langPatt})>/blog/<year:\d+>/<month:\d+>/<day:\d+>/<slug:\w+>" => 'blog/view/',
            'blog/<year:\d+>/<month:\d+>/<day:\d+>/<slug:\w+>' => 'blog/view/',
            'activity' => 'activity/index',
	    ['pattern' => '/', 'route' => 'site/index', 'suffix' => '/'],
            "<lang:({$langPatt})>/<module:\w+>/<controller:\w+>/<action:\w+>" => '<module>/<controller>/<action>',
            "<lang:({$langPatt})>/<controller:\w+>/<action:\w+>" => '<controller>/<action>',
        ]);
    }
    public static function changeLanguage($lang) {
        Yii::$app->language = $lang;
	Yii::$app->urlManager->setBaseUrl(Yii::$app->urlManager->getBaseUrl() . '/' . $lang);
        if (Yii::$app->language != Yii::$app->sourceLanguage) $lang .= '/';
        Yii::$app->homeUrl = Yii::$app->homeUrl . $lang;
    }
    /* hRefLang returns the URL for the $url passed as the first parameter but for the 
       $langCode passed as the second parameter.
     */
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
    }
}

<?php
namespace frontend\components;

use Yii;
use yii\base\ActionFilter;
use common\models\BlogEntry;
use common\models\Config;
use yii\helpers\Url;

use frontend\components\LanguageBootstrap;

class MenuLinkFilter extends ActionFilter {
    public function beforeAction($action) {
        $blog_entry = BlogEntry::find()->orderBy(['id' => SORT_DESC])->one();
        $time = strtotime($blog_entry->post_date);
        $blog_link = Url::to([
            'blog/view',
            'year' => date('Y', $time),
            'month' => date('m', $time),
            'day' => date('d', $time),
            'slug' => $blog_entry->slug
        ]);
        Yii::$app->params['blog_link'] = $blog_link;
        $catalog_url = Config::findOne('catalog_url')->value;
        Yii::$app->params['catalog_url'] = $catalog_url;
        return parent::beforeAction($action);
    }
}

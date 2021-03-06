<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\components\LanguageBootstrap;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?=Url::to('@web/img/favicon.ico')?>" type="image/x-icon">
    <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<img class="img-responsive" alt="Canary Gay Experience" src="' . Url::to('@web/img/logo.png') . '">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-static-top',
                ],
                'innerContainerOptions' => [
                    'class' => 'container navbar-center'
                ]
            ]);
            $menuItems = [
                ['label' => Yii::t('app', 'Home'), 'url' => Yii::$app->homeUrl, 'active' => $this->context->route == 'site/index'],
                ['label' => Yii::t('app', 'Calendar'), 'url' => ['activity/index'], 'active' => $this->context->route == 'activity/index'],
                ['label' => Yii::t('app', 'Activities'), 'url' => ['/site/activities']],
                ['label' => Yii::t('app', 'Blog'), 'url' => Yii::$app->params['blog_link'], 'active' => $this->context->route == 'blog/view'],
                '<li class="divider-vertical"></li>'
            ];
            $altLangs = [];
            foreach (Yii::$app->params['languages'] as $code => $lang) {
	        if ($code != Yii::$app->language) $altLangs[] = [
		    'label' => $lang,
		    'url' => LanguageBootstrap::hRefLang(Yii::$app->request->url, $code)
		];
            }
            $langMenu = [
                'label' => Yii::$app->params['languages'][Yii::$app->language],
                'url' => '#',
                'items' => $altLangs
            ];
            $menuItems[] = $langMenu;
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
        <?= $content ?>

    </div>

    <footer class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <img class="logo" src="<?= Url::to('@web/img/baloon.png') ?>">
                </div>
                <div class="col-md-5">
                    <address>
                      <h4 class="can-gay-exp">Canary Gay Experience, S.L.</h4>
                      Bonsai s/n Apto. 269, Maspalomas<br>
                      Las Palmas 35100, España<br>
                      (+34) 619 368 771<br>
                      <a mailto="direccion@canarygayexperience.com">direccion@canarygayexperience.com</a>
                    </address>
                    <a href="<?=Url::to(['/site/conditions'])?>" class="label label-default">Condiciones legales</a><br>
                </div>
                <div class="col-md-3 secondary-menu">
                    <hr class="visible-xs-block visible-sm-block">
                    <h4 class="invisible"><?=Yii::t('app', 'Menu')?></h4>
                    <a href="<?=Url::to(['site/groups'])?>"><?=Yii::t('app', 'Group offers and prices')?></a><br>
                    <a href="<?=Url::to(['site/orders'])?>"><?=Yii::t('app', 'Orders and refunds')?></a><br>
                    <a href="<?=Url::to(['/site/about'])?>"><?=Yii::t('app', 'About us')?></a><br>
                    <a href="<?=Url::to(['/site/privacy'])?>"><?=Yii::t('app', 'Privacy policy')?></a><br>
                    <a href="<?=Url::to(['/site/contact'])?>"><?=Yii::t('app', 'Contact form')?></a><br>
                    <a target="_blank" href="<?=Yii::$app->params['catalog_url']?>"><?=Yii::t('app', 'Download catalog')?></a><br>
                </div>
                <div class="col-md-2 social-buttons">
                  <a target="_blank" href="http://www.facebook.com/CanaryGayExperience"><span class="social-btn social-btn-facebook"></span></a>
                  <a target="_blank" href="http://www.instagram.com/canarygayexperience"><span class="social-btn social-btn-instagram"></span></a>
                  <a target="_blank" href="http://es.pinterest.com/CanaryGayExp/"><span class="social-btn social-btn-pinterest"></span></a>
                  <a target="_blank" href="http://twitter.com/CanaryGayExp"><span class="social-btn social-btn-twitter"></span></a>
                  <a target="_blank" href="http://www.youtube.com/channel/UCtyWjQkAeCcgUY40X4tsgjQ"><span class="social-btn social-btn-youtube"></span></a>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright &copy; canarygayexperience.com (<?=Yii::$app->formatter->asDate('now', 'yyyy')?>)</p>
    </footer>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script>
      window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#aa0000",
              "text": "#ffdddd"
            },
            "button": {
              "background": "#ff0000"
            }
          },
          "position": "bottom-left",
          "content": {
            "message": "<?= Yii::t('app', 'This website uses cookies to ensure you get the best experience on our website.') ?>",
            "dismiss": "<?= Yii::t('app', 'Got it!') ?>",
            "link": "<?= Yii::t('app', 'Learn more') ?>"
          }
      })});
    </script>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

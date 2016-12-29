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
    <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<img alt="Canary Gay Experience" src="' . Url::to('@web/img/logo.png') . '">',
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
                ['label' => '', 'url' => null, 'options' => ['class' => 'divider-vertical']],
            ];
            /*
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']
                ];
            }
            */
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
                <div class="col-md-2 col-md-offset-1">
                    <img class="logo" src="<?= Url::to('@web/img/baloon.png') ?>">
                </div>
                <div class="col-md-3">
                    <address>
                      <h4>Canary Gay Experience, S.L.</h4>
                      1355 Market Street, Maspalomas<br>
                      Las Palmas 34103, España<br>
                      <span class="glyphicon glyphicon-earphone"> (123) 456-7890</span><br>
                      <span class="glyphicon glyphicon-envelope"> <a mailto="direccion@canarygayexperience.com">info@canarygayexperience.com</a>
                    </address>
                    <a href="<?=Url::to(['/site/conditions'])?>" class="label label-default">Condiciones legales</a><br>
                </div>
                <div class="col-md-3 secondary-menu">
                    <hr class="visible-xs-block visible-sm-block">
                    <h4 class="invisible">Menú</h4>
                    Libro de visitas<br>
                    Precios y ofertas de grupo<br>
                    Estamos en facebook<br>
                    <a href="<?=Url::to(['/site/about'])?>"><?=Yii::t('app', 'About us')?></a><br>
                    Solicitar promoción de actividad<br>
                    <a href="<?=Url::to(['/site/privacy'])?>"><?=Yii::t('app', 'Privacy policy')?></a>
                </div>
                <div class="col-md-2 social-buttons">
                  <span class="social-btn social-btn-facebook"></span>
                  <span class="social-btn social-btn-instagram"></span>
                  <span class="social-btn social-btn-pinterest"></span>
                  <span class="social-btn social-btn-twitter"></span>
                  <span class="social-btn social-btn-youtube"></span>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright &copy; canarygayexperience.com 2016</p>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

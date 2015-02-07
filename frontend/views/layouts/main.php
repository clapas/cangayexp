<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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
                'brandLabel' => 'Living The Sunset',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
                'innerContainerOptions' => [
                    'class' => 'container-fluid'
                ]
            ]);
            $menuItems = [
                ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
                ['label' => Yii::t('app', 'Sales'), 'url' => ['/site/ventas']],
                ['label' => Yii::t('app', 'Rentals'), 'url' => ['/site/about']],
                ['label' => Yii::t('app', 'Vacations'), 'url' => ['/site/contact']],
                ['label' => Yii::t('app', 'VIP Services'), 'url' => ['/site/contact'], 'items' => [
                    ['label' => Yii::t('app', 'Cooker'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Baby sitter'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Chauffeur'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Security'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Personal Shopper'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Touristic Guide'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Arranged Dinner'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Excursions'), 'url' => '#'],
                    ['label' => Yii::t('app', 'Events'), 'url' => '#']
                ]],
            ];
            /*
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            */
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $menuItems,
            ]);
            $menuItems = [[
                'label' => 'Español', 
                'url' => ['/site/index'],
                'items' => [
                    ['label' => 'English', 'url' => '#']
                ]
            ]];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
        <div class="navbar-filler"></div>

        <!--<div class="container">-->
        <?php /* Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */?>
        <?php /* Alert::widget() */?>
        <?= $content ?>
        <!--</div>-->
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

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
                ['label' => 'Ventas', 'url' => ['/site/index']],
                ['label' => 'Alquileres', 'url' => ['/site/about']],
                ['label' => 'Vacaciones', 'url' => ['/site/contact']],
                ['label' => 'Servicios VIP', 'url' => ['/site/contact'], 'items' => [
                    ['label' => 'Cocinero', 'url' => '#'],
                    ['label' => 'Niñera', 'url' => '#'],
                    ['label' => 'Chófer', 'url' => '#'],
                    ['label' => 'Seguridad', 'url' => '#'],
                    ['label' => 'Personal Shopping', 'url' => '#'],
                    ['label' => 'Guía turístico', 'url' => '#'],
                    ['label' => 'Cenas concertadas', 'url' => '#'],
                    ['label' => 'Excursiones', 'url' => '#'],
                    ['label' => 'Eventos', 'url' => '#']
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2 visible-lg-block visible-md-block">
              <?php
                  use yii\bootstrap\ButtonGroup;
                  echo ButtonGroup::widget([
                      'options' => [
                          'class' => 'btn-group-vertical'
                      ],
                      'buttons' => [
                          ['label' => 'Meloneras', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                          ['label' => 'Maspalomas', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                          ['label' => 'Campo de Golf', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                          ['label' => 'San Agustín', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                          ['label' => 'Puerto Rico', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                          ['label' => 'Gran Canaria', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                          ['label' => 'Mapa', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
                      ]
                  ]);
              ?>
            </div>
            <div class="col-md-8">
            <?php 
            use yii\bootstrap\Carousel;
            echo Carousel::widget([
                'items' => [
                    // the item contains only the image
                    ['content' => '<img src="img/slideshow1.jpg">', 'caption' => '<h4>Primer título</h4><p>Este es el primer texto</p>'],
                    // equivalent to the above
                    ['content' => '<img src="img/slideshow2.jpg">', 'caption' => '<h4>Segundo título</h4><p>Este es el segundo texto</p>'],
                    // the item contains both the image and the caption
                    ['content' => '<img src="img/slideshow3.jpg">', 'caption' => '<h4>Tercer título</h4><p>Este es el tercer texto</p>'],
                ],
                'controls' => [
                    '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                    '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                ]
            ]); ?>
            </div>
          </div>
        </div>

        <div class="jumbotron">
          <h1>Living The Sunset</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
            fugiat nulla pariatur.</p>
          <p>Donec vel sapien sed dolor consequat elementum. Sed condimentum lacinia posuere. Vivamus sed velit quam. 
            Curabitur bibendum egestas orci, eleifend tempus dolor iaculis sed. Nunc luctus, quam et gravida dictum, 
            leo odio commodo risus, a dictum nulla erat et neque. Morbi sit amet malesuada sem, sed ornare urna. 
            Quisque enim felis, ullamcorper sed nisl vel, porttitor sagittis mi.</p>
          
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin iaculis suscipit leo nec faucibus. 
            Integer sodales libero et velit pharetra, sed interdum nisi bibendum. Sed ullamcorper eleifend lectus, 
            quis semper ante dictum id. Vestibulum placerat mauris tincidunt dapibus vulputate. Praesent fermentum 
            facilisis urna, a tristique risus lobortis eu. Cras lacinia sapien mi, in tristique purus porta a. Donec 
            tempus, nisi a ultrices iaculis, arcu diam blandit sem, in faucibus odio orci in augue. Quisque volutpat 
            semper ipsum a lacinia. Suspendisse eu elit tempus, laoreet lacus eget, posuere quam. Vivamus nec erat 
            tellus. Duis ut massa felis. Vestibulum a posuere nisl. Maecenas malesuada varius tortor ut scelerisque.</p>
          
        </div>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
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

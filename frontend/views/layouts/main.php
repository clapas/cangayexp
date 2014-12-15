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
            <div class="col-md-2">
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
                    ['content' => '<img data-src="holder.js/900x500/auto/#666:#666" alt="900x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiIvPjxnPjx0ZXh0IHg9IjM0MC45OTIxODc1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM2NjY7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDJwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj45MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">', 'caption' => '<h4>Primer título</h4><p>Este es el primer texto</p>'],
                    // equivalent to the above
                    ['content' => '<img data-src="holder.js/900x500/auto/#666:#666" alt="900x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiIvPjxnPjx0ZXh0IHg9IjM0MC45OTIxODc1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM2NjY7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDJwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj45MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">', 'caption' => '<h4>Segundo título</h4><p>Este es el segundo texto</p>'],
                    // the item contains both the image and the caption
                    ['content' => '<img data-src="holder.js/900x500/auto/#666:#666" alt="900x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiIvPjxnPjx0ZXh0IHg9IjM0MC45OTIxODc1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM2NjY7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDJwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj45MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true">', 'caption' => '<h4>Tercer título</h4><p>Este es el tercer texto</p>'],
                ],
                'controls' => [
                    '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                    '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                ]
            ]); ?>
            </div>
          </div>
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

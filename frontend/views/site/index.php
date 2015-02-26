<?php
/* @var $this yii\web\View */
$this->title = 'LivingTheSunset';
?>
<div class="container-fluid masthead">
  <div class="row">
    <div class="col-md-2 visible-lg-block visible-md-block">
      <?php echo $this->render('/site/_location_nav') ?>
    </div>
    <div class="col-md-8 col-xs-12">
      <?php 
      use yii\helpers\Html;
      use yii\bootstrap\Carousel;
      use yii\helpers\Url;
      echo Carousel::widget([
          'items' => [
              ['content' => '<img src="' . Url::to('@web/img/slideshow1.jpg') . '">', 'caption' => '<h4>Primer título</h4><p>Este es el primer texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow2.jpg') . '">', 'caption' => '<h4>Segundo título</h4><p>Este es el segundo texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow3.jpg') . '">', 'caption' => '<h4>Tercer título</h4><p>Este es el tercer texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow4.jpg') . '">', 'caption' => '<h4>Cuarto título</h4><p>Este es el cuarto texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow5.jpg') . '">', 'caption' => '<h4>Quinto título</h4><p>Este es el quinto texto</p>'],
          ],
          'controls' => [
              '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
              '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
          ]
      ]); ?>
    </div>
    <div class="col-xs-12 visible-xs-block visible-sm-block">
      <br>
      <?php echo $this->render('/site/_location_nav') ?>
    </div>
  </div>
</div>

<div class="jumbotron">
  <h1>Living In The Sunset</h1>
  <div class="row">
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-home"></i>
      <h3>Quisque enim felis</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat.</p>
    </div>
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-heart"></i>
      <h3>Ullamcorper sed nisl vel</h3>
      <p>Donec vel sapien sed dolor consequat elementum. Sed condimentum lacinia posuere. Vivamus sed velit quam. 
      Curabitur bibendum egestas orci, eleifend tempus dolor iaculis sed. Nunc luctus, quam et gravida dictum, 
      leo odio commodo risus, a dictum nulla erat et neque.</p>
  
    </div>
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-picture"></i>
      <h3>Porttitor sagittis mi</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin iaculis suscipit leo nec faucibus. 
        Integer sodales libero et velit pharetra, sed interdum nisi bibendum. Sed ullamcorper eleifend lectus, 
        quis semper ante dictum id. Vestibulum placerat mauris tincidunt dapibus vulputate.</p>
    </div>
  </div>
</div>

<div class="site-index">

  <div class="body-content container">

    <div class="title">
      <h1><?= Yii::t('app', 'Services') ?></h1>
      <p class="lead">Praesent odio elit, dapibus at convallis vel, luctus sit amet dui. Curabitur in pretium quam. Nullam vel 
        lorem ut purus interdum rhoncus. Nam at pellentesque ex. Quisque at diam laoreet, viverra justo ac, 
        bibendum lectus. Pellentesque faucibus tempor ligula, a ultrices justo maximus id. Ut at ligula mauris. 
        Morbi id lacinia ligula, ut rutrum magna.</p>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_171931424.jpg', ['class' => 'img-responsive']) ?>
            <a name="comprehensive_management"></a>
            <h3><?= Yii::t('app', 'Comprehensive Management') ?></h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec 
             gravida erat vel gravida malesuada. In nisi lacus, faucibus non dignissim in, molestie ac lectus.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_208840960.jpg', ['class' => 'img-responsive']) ?>
            <a name="cooker"></a>
            <h3><?= Yii::t('app', 'Cooker') ?></h3>
            <p>Donec eget faucibus purus, vel ullamcorper ex. In eget blandit neque. Nulla 
             sit amet erat porta, lobortis massa ornare, fermentum ex. Vestibulum ut urna lectus. Fusce 
             sagittis mauris nibh, at imperdiet lectus accumsan eu..</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_172154483.jpg', ['class' => 'img-responsive']) ?>
            <a name="baby_sitter"></a>
            <h3><?= Yii::t('app', 'Baby Sitter') ?></h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_94199572.jpg', ['class' => 'img-responsive']) ?>
            <a name="chauffeur"></a>
            <h3><?= Yii::t('app', 'Chauffeur') ?></h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_182239871.jpg', ['class' => 'img-responsive']) ?>
            <a name="touristic_guide"></a>
            <h3><?= Yii::t('app', 'Touristic Guide') ?></h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_122048368.jpg', ['class' => 'img-responsive']) ?>
            <a name="arranged_dinner"></a>
            <h3><?= Yii::t('app', 'Arranged Dinner') ?></h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_62976403.jpg', ['class' => 'img-responsive']) ?>
            <a name="security"></a>
            <h3><?= Yii::t('app', 'Security') ?></h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <?= Html::img('@web/img/shutterstock_62913607.jpg', ['class' => 'img-responsive']) ?>
            <a name="personal_shopper"></a>
            <h3><?= Yii::t('app', 'Personal Shopper') ?></h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
  <h1>Living The Sunset</h1>
  <? var_dump($_GET) ?>
  <div class="row">
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-home"></i>
      <h3>Quisque enim felis</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur.</p>
    </div>
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-heart"></i>
      <h3>Ullamcorper sed nisl vel</h3>
      <p>Donec vel sapien sed dolor consequat elementum. Sed condimentum lacinia posuere. Vivamus sed velit quam. 
      Curabitur bibendum egestas orci, eleifend tempus dolor iaculis sed. Nunc luctus, quam et gravida dictum, 
      leo odio commodo risus, a dictum nulla erat et neque. Morbi sit amet malesuada sem, sed ornare urna.</p>
  
    </div>
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-picture"></i>
      <h3>Porttitor sagittis mi</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin iaculis suscipit leo nec faucibus. 
        Integer sodales libero et velit pharetra, sed interdum nisi bibendum. Sed ullamcorper eleifend lectus, 
        quis semper ante dictum id. Vestibulum placerat mauris tincidunt dapibus vulputate. Praesent fermentum 
        facilisis urna, a tristique risus lobortis eu.</p>
    </div>
  </div>
</div>

<div class="site-index">

  <div class="body-content container">

    <div class="title">
      <h1>Servicios</h1>
      <p>Praesent odio elit, dapibus at convallis vel, luctus sit amet dui. Curabitur in pretium quam. Nullam vel 
        lorem ut purus interdum rhoncus. Nam at pellentesque ex. Quisque at diam laoreet, viverra justo ac, 
        bibendum lectus. Pellentesque faucibus tempor ligula, a ultrices justo maximus id. Ut at ligula mauris. 
        Morbi id lacinia ligula, ut rutrum magna.</p>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <span class="fa-stack fa-4x"><i class="fa-stack-1x glyphicon glyphicon-briefcase"></i></span>
            <h3>Gestión Integral</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec 
             gravida erat vel gravida malesuada. In nisi lacus, faucibus non dignissim in, molestie ac lectus.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-cutlery"></i></span>
            <h3>Cocinero</h3>
            <p>Donec eget faucibus purus, vel ullamcorper ex. In eget blandit neque. Nulla 
             sit amet erat porta, lobortis massa ornare, fermentum ex. Vestibulum ut urna lectus. Fusce 
             sagittis mauris nibh, at imperdiet lectus accumsan eu..</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-eye-open"></i></span>
            <h3>Niñera</h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-road"></i></span>
            <h3>Chófer</h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-flag"></i></span>
            <h3>Guía Turístico</h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-book"></i></span>
            <h3>Cenas Concertadas</h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-facetime-video"></i></span>
            <h3>Seguridad</h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service animated fadeInUp visible" data-animation="fadeInUp" data-delay="500">
            <span class="fa-stack fa-4x"><i class="fa fa-desktop fa-stack-1x service-icon glyphicon glyphicon-gift"></i></span>
            <h3>Personal Shopper</h3>
            <p>Suspendisse felis erat, vestibulum a sapien at, congue cursus velit. Suspendisse cursus, sapien 
           vel tempor iaculis, justo urna iaculis ex, et faucibus nunc dui et dolor.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

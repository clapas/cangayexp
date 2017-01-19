<?php
/* @var $this yii\web\View */
$this->title = 'Canary Gay Experience';
use yii\helpers\Html;
use yii\helpers\Url;
?>

  <div class="container">

    <div class="panel panel-default">
      <div class="panel-heading"><?=Yii::t('app', 'Upcoming activity')?></div>
      <div class="panel-body row activity">
        <?= $this->render('/activity/_full_view', ['activity' => $activity]) ?>
      </div>
    </div>

    <h2 class="text-center join-us"><?=Yii::t('app', 'Join us and live an unforgettable experience')?></h2>

    <!-- Content Row -->
    <div class="row featured">
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead1.jpg')?>" class="img-responsive img-rounded">
        <h3><?=Yii::t('app', 'Know our history')?></h3>
        <p><?=Yii::t('app', 'Travel through time and know the history of the Canaries, how the islands were formed, how the Aborigines lived and the different periods after the conquest. Visit the neighborhood of Vegueta and listen to what its cobbled streets tell you about Columbus or his stories of pirates.')?></p>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead2.jpg')?>" class="img-responsive img-rounded">
        <h3><?=Yii::t('app', 'Discover corners of Gran Canaria')?></h3>
        <p><?=Yii::t('app', 'Explore the interior of the island and discover small natural monuments, enjoy unique places, connect with nature and live a day of adventure with our experiences. Discover other ways to live our coast with our water activities.')?></p>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead3.jpg')?>" class="img-responsive img-rounded">
        <h3><?=Yii::t('app', 'Be carried away by the flavors')?></h3>
        <p><?=Yii::t('app', 'Get submerged in our intense flavors, enjoy an island full of aromas and colors. Try our <em>papas arrugás</em> with <em>mojo picón</em>, taste our cheeses and wines, savor the <em>gofio</em> in its diverse culinary creations. Take a good taste of Gran Canaria.')?></p>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

  </div>

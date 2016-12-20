<?php
/* @var $this yii\web\View */
$this->title = 'Canary Gay Experience';
use yii\helpers\Html;
use yii\bootstrap\Carousel;
use yii\helpers\Url;
?>

  <div class="container">

    <div class="panel panel-default">
      <div class="panel-heading"><?=Yii::t('app', 'Next activity')?></div>
      <div class="panel-body row">
        <div class="col-md-11 col-md-offset-1">
            <!--<span class="label label-danger">Próxima actividad</span>-->
            <h2 class="activity-title"><?= $activity->title ?></h2>
        </div>
        <div class="col-md-1">
            <time datetime="<?= $activity->start_ts ?>" class="icon">
              <em><?= $activity->start_weekday ?></em>
              <strong><?= $activity->start_month ?></strong>
              <span><?= $activity->start_day ?></span>
            </time>
        </div>
        <div class="col-md-5">
          <?php 
            $items = [];
            foreach ($activity->files as $file) {
                $items[] = ['content' => "<img src=\"{$file->url}\">"];
            }
            if (count($items) < 1) 
                echo '<img class="img-responsive img-thumbnail img-rounded" src="http://placehold.it/450x400" alt="">';
            else if (count($items) < 2)
                echo "<img class=\"img-responsive img-thumbnail img-rounded\" src=\"{$activity->files[0]->url}\">";
            else echo Carousel::widget([
                 'items' => $items,
                 'controls' => [
                   '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                   '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                 ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <h3><?= $activity->subtitle ?></h3>
            <p><?= $activity->description ?></p>
            <dl>
                <dt><?=Yii::t('app', 'Price')?></dt>
                <dd><?= $activity->price_eucents / 100. ?>€ / persona</dd>
                <dt><?=Yii::t('app', 'Capacity')?></dt>
                <dd><?= $activity->vacants ?> <?=Yii::t('app', 'of')?> <?= $activity->capacity ?></dd>
            </dl>
            <a class="btn btn-primary btn-lg" href="#"><?=Yii::t('app', 'Enroll me!')?></a>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-11 col-md-offset-1">
            <h3><?=Yii::t('app', 'Itinerary')?></h3>
            <p><strong><?=Yii::t('app', 'Start')?></strong>: <a href="<?= $activity->start_place_map_url ?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$activity->start_place_name?></a>, <?=$activity->start_ts?><br>
              <strong><?=Yii::t('app', 'Return')?></strong>: <a href="<?=$activity->end_place_map_url?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$activity->end_place_name?></a>, <?=$activity->end_ts?></p>
            <p><?=$activity->itinerary?></p>
            <p><em><strong><?=Yii::t('app', 'Includes')?></strong>: <?= $activity->includes ?></em></p>
            <p><small>*<?= $activity->notes ?></small></p>
            <a class="btn btn-sm btn-primary btn-lg" href="#"><?=Yii::t('app', 'Enroll me!')?></a>
            <a class="btn btn-sm btn-success" href="#"><?=Yii::t('app', 'More activities')?></a>
        </div>
      </div>
    </div>

    <h2 class="text-center join-us"><?=Yii::t('app', 'Join us and live an unforgettable experience')?></h2>

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead1.jpg')?>" class="img-responsive">
        <h3><?=Yii::t('app', 'Alternative activities in the Canary Islands')?></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
        <a class="btn btn-default" href="#"><?=Yii::t('app', 'More Info')?></a>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead2.jpg')?>" class="img-responsive">
        <h3><?=Yii::t('app', 'For visitors and residents')?></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
        <a class="btn btn-default" href="#"><?=Yii::t('app', 'More Info')?></a>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead3.jpg')?>" class="img-responsive">
        <h3><?=Yii::t('app', 'Professionalism and experience')?></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
        <a class="btn btn-default" href="#"><?=Yii::t('app', 'More Info')?></a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

  </div>

<?php 
use yii\bootstrap\Carousel;
use yii\helpers\Html; 
use yii\helpers\Url; 
$viewURL = Url::to(['activity/view', 'id' => $model->id]);
?>
<div class="activity-list-item">
  <div class="col-md-3 col-sm-6 col-xs-8">
    <span class="date visible-xs"><?=Yii::$app->formatter->asDate($model->start_ts, 'full')?></span>
    <?php
    if (count($model->files) < 1) 
        echo '<img class="img-responsive img-thumbnail img-rounded" src="http://placehold.it/288x200" alt="">';
    else
        echo "<div class=\"img-responsive img-thumbnail img-rounded\" style=\"background-image: url('{$model->files[0]->url})'\")></div>"; ?>
  </div>
  <div class="col-md-9 col-sm-6 col-xs-12 margin-below-sm">
    <span class="date hidden-xs"><?=Yii::$app->formatter->asDate($model->start_ts, 'full')?></span>
    <h3><?=$model->title?></h3>
    <h4><?=$model->subtitle?></h4>
    <p>
      <strong><?=Yii::t('app', 'Start')?></strong>: <a href="<?=$model->start_place_map_url?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$model->start_place_name?></a>, <?=Yii::$app->formatter->asDatetime($model->start_ts, 'medium')?><br>
      <strong><?=Yii::t('app', 'Return')?></strong>: <a href="<?=$model->end_place_map_url?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$model->start_place_name?></a>, <?=Yii::$app->formatter->asDatetime($model->end_ts, 'medium')?></p>
    <a class="btn btn-sm btn-primary" href="<?=Url::to(['site/enrol', 'activity' => $model->subtitle, 'start_ts' => $model->start_ts])?>"><?=Yii::t('app', 'Enroll me!')?></a>
    <a class="btn btn-sm btn-default" href="<?=Url::to(['activity/view', 'id' => $model->id])?>"><?=Yii::t('app', 'Details')?></a>
  </div>
  <div class="clearfix"></div>
</div>

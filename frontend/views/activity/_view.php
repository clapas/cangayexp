<?php 
use yii\helpers\Html; 
use yii\helpers\Url; 
$viewURL = Url::to(['activity/view', 'id' => $model->id]);
?>
<div class="activity-list-item">
  <div class="col-md-3 col-sm-6 col-xs-8">
    <span class="date visible-xs"><?=$model->start_ts?></span>
    <img class="img-thumbnail" style="background-image: url(<?=$model->files[0]['url']?>)">
  </div>
  <div class="col-md-9 col-sm-6 col-xs-12 margin-below-sm">
    <span class="date hidden-xs"><?=$model->start_ts?></span>
    <h3><?=$model->titles[0]['title']?></h3>
    <h4><?=$model->subtitles[0]['subtitle']?></h4>
    <p>
      <strong><?=Yii::t('app', 'Start')?></strong>: <a href="<?=$model->start_place_map_url?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$model->start_place_name?></a>, <?=$model->start_ts?><br>
      <strong><?=Yii::t('app', 'Return')?></strong>: <a href="<?=$model->end_place_map_url?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$model->start_place_name?></a>, <?=$model->end_ts?></p>
    <a class="btn btn-sm btn-primary"><?=Yii::t('app', 'Enroll me!')?></a>
    <a class="btn btn-sm btn-default"><?=Yii::t('app', 'Details')?></a>
  </div>
  <div class="clearfix"></div>
</div>

<?php
use yii\bootstrap\Carousel;
use yii\helpers\Url;
?>

<?php if ($activity): ?>
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
          $url = str_replace(' ', '%20', $file->url);
          $items[] = ['content' => "<div class=\"img-thumbnail img-rounded\" style=\"background-image: url({$url})\"></div>"];
      }
      if (count($items) < 1) 
          echo '<img class="img-responsive img-thumbnail img-rounded" src="http://placehold.it/450x400" alt="">';
      else if (count($items) < 2) {
          $url = str_replace(' ', '%20', $activity->files[0]->url);
          echo "<div class=\"img-thumbnail img-rounded\" style=\"background-image: url({$url})\"></div>";
      } else echo Carousel::widget([
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
      <a class="btn btn-primary btn-lg" href="<?=Url::to(['/site/enrol', 'activity' => $activity->subtitle, 'start_ts' => $activity->start_ts])?>"><?=Yii::t('app', 'Enroll me!')?></a>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-11 col-md-offset-1">
      <h3><?=Yii::t('app', 'Itinerary')?></h3>
      <p><strong><?=Yii::t('app', 'Start')?></strong>: <a href="<?= $activity->start_place_map_url ?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$activity->start_place_name?></a>, <?=Yii::$app->formatter->asDatetime($activity->start_ts, 'medium')?><br>
        <strong><?=Yii::t('app', 'Return')?></strong>: <a href="<?=$activity->end_place_map_url?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?=$activity->end_place_name?></a>, <?=Yii::$app->formatter->asDatetime($activity->end_ts, 'medium')?></p>
      <?php if ($activity->itinerary): ?>
        <p><?=$activity->itinerary?></p>
      <?php endif; ?>
      <?php if ($activity->includes): ?>
        <p><em><strong><?=Yii::t('app', 'Includes')?></strong>: <?= $activity->includes ?></em></p>
      <?php endif; ?>
      <?php if ($activity->notes): ?>
        <p><small>*<?= $activity->notes ?></small></p>
      <?php endif; ?>
      <a class="btn btn-sm btn-primary btn-lg" href="<?=Url::to(['/site/enrol', 'activity' => $activity->subtitle, 'start_ts' => $activity->start_ts])?>"><?=Yii::t('app', 'Enroll me!')?></a>
      <a class="btn btn-sm btn-success" href="<?=Url::to(['/activity/index'])?>"><?=Yii::t('app', 'More activities')?></a>
  </div>
<?php else: ?> 
  <div class="col-md-12 text-danger">
    <strong><?= Yii::t('yii', 'No results found.') ?></strong>
  </div>
<?php endif; ?> 

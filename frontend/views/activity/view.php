<?php
use yii\bootstrap\Carousel;
use yii\helpers\Url;
?>

<div class="container">
  <h1 class="page-header text-center"><?=Yii::t('app', 'Activity details')?></h1>
  <div class="row activity">
    <?= $this->render('/activity/_full_view', ['activity' => $activity]) ?>
  </div>
</div>

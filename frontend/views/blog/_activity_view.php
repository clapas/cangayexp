<?php
use yii\helpers\Url;
?>
<a class="list-group-item" href="<?=Url::to(['/activity/view', 'id' => $model->id])?>">
  <span class="date"><?=Yii::$app->formatter->asDate($model->start_ts, 'medium')?></span>
  <h4 class="list-group-item-heading"><?=$model->title?></h4>
  <p class="list-group-item-text"><?=$model->subtitle?></p>
</a>

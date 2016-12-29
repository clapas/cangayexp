<?php
use yii\helpers\Url;
?>
<a class="list-group-item" href="<?=Url::to(['/activity/view', 'id' => $model->id])?>">
  <span class="date"><?=$model->start_ts?></span>
  <h4 class="list-group-item-heading"><?=$model->titles[0]['title']?></h4>
  <p class="list-group-item-text"><?=$model->subtitles[0]['subtitle']?></p>
</a>

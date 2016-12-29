<?php 
use yii\helpers\Url; 
?>
<a data-pjax="0" class="blog-index-entry" href="<?=Url::to([
      '/blog/view',
      'year' => $model->post_year,
      'month' => $model->post_month,
      'day' => $model->post_day,
      'slug' => $model->slug
  ])?>">
  <h2><?=$model->title?> <small><?=$model->language->name?></small></h2>
  <span class="small"><?=$model->post_date?> <?=Yii::t('app', 'By') ?> <?=$model->author?></span>
</a>

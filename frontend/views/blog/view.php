<?php
use kartik\markdown\Markdown;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
$this->title = 'Canary Gay Experience Blog - ' . $model->title;
?>
<div class="container-fluid">
  <div class="row">
    <?php
      Pjax::begin([
          'enablePushState' => false, // to disable push state
          'options' => ['class' => 'blog-index col-md-3'],
          'enableReplaceState' => false // to disable replace state
      ]);
      echo ListView::widget([
          'dataProvider' => $dataProvider,
          'itemView' => '_view',
          'layout' => "<div class=\"blog-index-header\"><h1>> Blog</h1><small class=\"text-right\">{summary}</small></div>\n<div class=\"blog-index-body\">{items}</div>\n<div class=\"text-center\">{pager}</div>",
          'itemOptions' => ['tag' => false],
      ]);
      Pjax::end(); ?>
    <div class="col-md-6 blog-entry">
      <h1><?=$model->title?></h1>
       <?=Yii::t('app', 'By')?> <?=$model->author?><br>
       <span class="small"><?=Yii::t('app', 'Published on')?> <?=Yii::$app->formatter->asDate($model->post_date, 'medium')?></span><br><br>
      <p class="lead"><?=$model->lead_para?></p>
      <?=Markdown::convert($model->md_content, [
          'custom' => [
              '<img' => '<img class="img img-responsive"'
          ]
      ]);?>
      <hr>
      <?= $this->render('/site/_share_buttons', ['url' => Url::canonical(), 'title' => $model->title, 'description' => $model->lead_para]) ?>
    </div>
    <br class="visible-xs-block visible-sm-block">
    <div class="col-md-3">
      <div class="list-group activities">
        <div class="list-group-item list-group-item-info">
          <h4><?=Yii::t('app', 'Upcoming activities')?></h4>
        </div>
      <?php
      echo ListView::widget([
          'dataProvider' => $upcoming_activities,
          'emptyText' => '<div class="list-group-item">' . Yii::t('yii', 'No results found.') . '</div>',
          'summary' => false,
          'itemView' => '_activity_view',
          'options' => ['tag' => false],
          'itemOptions' => ['tag' => false]
      ]); ?>
      </div>
    </div>
  </div>
</div>

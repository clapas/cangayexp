<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
use yii\helpers\FormatConverter;
use yii\widgets\Pjax;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Calendar');
?>

<div class="container">
  <div class="text-center page-header">
    <h1><?= Html::encode($this->title) ?></h1>
  </div>
  
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  <form class="well well-sm form-inline row">
    <div class="form-group col-md-4 col-sm-7">
      <?php 
        $from = Yii::t('app', 'From');
        $layout = "<span class=\"input-group-addon\">$from</span>{input}{picker}";
        echo DatePicker::widget([
          'model' => $searchModel,
          'attribute' => 'start_ts',
          'layout' => $layout,
          'pluginOptions' => [
              'format' => 'yyyy-mm-dd',
              'autoclose' => true
          ],
          'pluginEvents' => [
              'changeDate' => 'function(e) { $.pjax({container: \'#p0\', data: {start_ts: e.date.toISOString()}}); }'
          ],
          'type' => DatePicker::TYPE_COMPONENT_PREPEND
      ]); ?>
    </div>
  </form>
  
  <div class="activity-list">
      <?php 
        Pjax::begin();
        echo ListView::widget([
          'dataProvider' => $dataProvider,
          'layout' => "{summary}\n<div class=\"well well-sm\">{items}</div>\n<div class=\"text-center\">{pager}</div>",
          'summaryOptions' => ['class' => 'text-right'],
          'pager' => [
              'options' => ['class' => 'pagination pagination-lg']
          ],
          'itemView' => '_view',
          'options' => ['class' => 'row'],
              /*
          'itemOptions' => [
              'class' => 'col-sm-6 col-md-4'
          ]
              */
      ]); 
      Pjax::end(); ?>
  </div>
</div>

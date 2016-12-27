<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;

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
      <div class='input-group date col-sm-12'>
        <span class="input-group-addon"><?=Yii::t('app', 'From')?></span>
         <?php echo DatePicker::widget([
             'model' => $searchModel,
             'attribute' => 'start_ts',
             'options' => ['class' => 'form-control']
         ]); ?>
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
    </div>
    <div class="form-group col-md-3 col-sm-5">
      <select class="form-control col-sm-12">
        <option>Todas las actividades</option>
        <option>Submarinismo</option>
        <option>Barranquismo</option>
        <option>Surf</option>
        <option>Senderismo</option>
      </select>
    </div>
  </form>
  
  <div class="activity-list">
  
      <?php echo ListView::widget([
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
      ]); ?>
  </div>
</div>
<?php
Modal::begin([
    'header' => '<h2>' . Yii::t('app', 'Book this property') . '</h2>',
    'options' => ['id' => 'book_modal']
]);

echo Yii::t('app', 'Contact us at') . ' ' . Html::mailto('livinginthesunset@gmail.com');

Modal::end();
$script = <<< JS
    $('a[href="#book"]').on('click', function() {
        $('#book_modal').modal('show');
    });
    /*
    $('#from-datetime-filter').datetimepicker({
        format: 'D MMM YYYY, dddd',
        locale: 'es',
        defaultDate: new Date(2016,11,24)
    });
    */
JS;
$this->registerJs($script);
?>

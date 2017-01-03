<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div role="tabpanel">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-justified" role="tablist">
        <?php $f = 1; foreach ($languages as $code => $lang): ?>
          <li role="presentation"<?php echo $f-->0?'class="active"':''?>>
	    <a href="#title_<?=$code?>" aria-controls="home" role="tab" data-toggle="tab"><?=$lang?></a>
	  </li>
	<?php endforeach; ?>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <?php $f = 1; foreach ($languages as $code => $lang): ?>
          <div role="tabpanel" class="tab-pane <?php echo $f-->0?'active':''?>" id="title_<?= $code ?>">
	    <div class="form-group">
              <?= Html::activeLabel($model, 'titles') ?>
              <input type="text" class="form-control" name="ActivityForm[titles][<?= $code ?>]" maxlength="32" value="<?= $model->titles[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'subtitles') ?>
              <input type="text" class="form-control" name="ActivityForm[subtitles][<?= $code ?>]" maxlength="32" value="<?= $model->subtitles[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'descriptions') ?>
              <textarea rows="8" class="form-control" name="ActivityForm[descriptions][<?= $code ?>]"><?= $model->descriptions[$code] ?></textarea>
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'itineraries') ?>
              <input type="text" class="form-control" name="ActivityForm[itineraries][<?= $code ?>]" maxlength="32" value="<?= $model->itineraries[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'includeses') ?>
              <input type="text" class="form-control" name="ActivityForm[includeses][<?= $code ?>]" maxlength="32" value="<?= $model->includeses[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'noteses') ?>
              <input type="text" class="form-control" name="ActivityForm[noteses][<?= $code ?>]" maxlength="32" value="<?= $model->noteses[$code] ?>">
	    </div>
          </div>
	<?php endforeach; ?>
      </div>
      <br>
    </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $form->field($model, 'start_ts')->textInput() ?>
      <?php DateTimePicker::widget([
             'model' => $model,
             'language' => Yii::$app->language,
             'attribute' => 'start_ts',
             'type' => 1,
             //'language' => 'ru',
             //'dateFormat' => 'yyyy-MM-dd hh:mm',
         ]);
      ?>
      <?= $form->field($model, 'start_place_name')->textInput(['maxlength' => 64]) ?>
      <?= $form->field($model, 'start_place_map_url')->textInput(['maxlength' => 128]) ?>
      <?= $form->field($model, 'capacity')->widget(MaskedInput::classname(), [
          'clientOptions' => [
              'alias' =>  'integer',
              'autoGroup' => true
          ]
      ]) ?>
      <?= $form->field($model, 'price_eucents')->widget(MaskedInput::classname(), [
          'clientOptions' => [
              'alias' =>  'decimal',
              'autoGroup' => true
          ]
      ]) ?>
    </div>
    <div class="col-lg-6">
      <?= $form->field($model, 'end_ts')->textInput() ?>
      <?php DateTimePicker::widget([
             'model' => $model,
             'language' => Yii::$app->language,
             'attribute' => 'end_ts',
             'type' => 1,
             //'language' => 'ru',
             //'dateFormat' => 'yyyy-MM-dd hh:mm',
         ]);
      ?>
      <?= $form->field($model, 'end_place_name')->textInput(['maxlength' => 64]) ?>
      <?= $form->field($model, 'end_place_map_url')->textInput(['maxlength' => 128]) ?>
      <?= $form->field($model, 'vacants')->widget(MaskedInput::classname(), [
          'clientOptions' => [
              'alias' =>  'integer',
              'autoGroup' => true
          ]
      ]);?>
  
     </div>
  </div>

  <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
  //$(function() {
     $('form').on('change', 'input:file', function() {
       var fileName = $(this).val();
       if (fileName) $('input[type=file]:first').clone().insertAfter('input[type=file]:last');
     });
  //});
JS;
$this->registerJs($script);
?>

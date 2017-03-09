<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

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
              <input type="text" class="form-control" name="ActivityForm[subtitles][<?= $code ?>]" maxlength="64" value="<?= $model->subtitles[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'descriptions') ?>
              <textarea rows="2" class="form-control" name="ActivityForm[descriptions][<?= $code ?>]" maxlength="256"><?= $model->descriptions[$code] ?></textarea>
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'itineraries') ?>
              <textarea rows="4" class="form-control" name="ActivityForm[itineraries][<?= $code ?>]" maxlength="512"><?= $model->itineraries[$code] ?></textarea>
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'includeses') ?>
              <input type="text" class="form-control" name="ActivityForm[includeses][<?= $code ?>]" maxlength="128" value="<?= $model->includeses[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'noteses') ?>
              <textarea rows="2" class="form-control" name="ActivityForm[noteses][<?= $code ?>]" maxlength="256"><?= $model->noteses[$code] ?></textarea>
	    </div>
          </div>
	<?php endforeach; ?>
      </div>
      <br>
    </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $form->field($model, 'start_ts')->widget(DateTimePicker::classname(), [
          'type' => 1,
          'options' => ['tabindex' => 1],
          'pluginOptions' => ['autoclose' => true]
      ]); ?>
      <?= $form->field($model, 'start_place_name')->textInput(['maxlength' => 64, 'tabindex' => 3]) ?>
      <?= $form->field($model, 'start_place_map_url')->textInput(['maxlength' => 128, 'tabindex' => 5]) ?>
      <?= $form->field($model, 'capacity')->widget(MaskedInput::classname(), [
          'options' => ['tabindex' => 7, 'class' => 'form-control'],
          'clientOptions' => [
              'alias' =>  'integer',
              'autoGroup' => true
          ]
      ]) ?>
      <?= $form->field($model, 'price_eucents')->widget(MaskedInput::classname(), [
          'options' => ['tabindex' => 9, 'class' => 'form-control'],
          'clientOptions' => [
              'alias' =>  'decimal',
              'autoGroup' => true
          ]
      ]) ?>
    </div>
    <div class="col-lg-6">
      <?= $form->field($model, 'end_ts')->widget(DateTimePicker::classname(), [
          'type' => 1,
          'options' => ['tabindex' => 2],
          'pluginOptions' => ['autoclose' => true]
      ]); ?>
      <?= $form->field($model, 'end_place_name')->textInput(['maxlength' => 64, 'tabindex' => 4]) ?>
      <?= $form->field($model, 'end_place_map_url')->textInput(['maxlength' => 128, 'tabindex' => 6]) ?>
      <?= $form->field($model, 'vacants')->widget(MaskedInput::classname(), [
          'options' => ['tabindex' => 8, 'class' => 'form-control'],
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

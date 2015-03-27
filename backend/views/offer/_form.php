<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Offer */
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
              <input type="text" class="form-control" name="OfferForm[titles][<?= $code ?>]" maxlength="32" value="<?= $model->titles[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'descriptions') ?>
              <textarea rows="8" class="form-control" name="OfferForm[descriptions][<?= $code ?>]"><?= $model->descriptions[$code] ?></textarea>
	    </div>
          </div>
	<?php endforeach; ?>
      </div>
      <br>
    </div>

  <div class="row">
    <div class="col-lg-6">
      <?= $form->field($model, 'zone_name')->dropDownList($zones, ['prompt' => Yii::t('app', 'Select a zone')]) ?>
      <?= $form->field($model, 'commun_expenses_eu')->widget(MaskedInput::classname(), [
          'clientOptions' => [
              'alias' =>  'decimal',
              'autoGroup' => true
          ]
      ]) ?>
      <?= $form->field($model, 'floor_area_m2')->widget(MaskedInput::classname(), [
          'clientOptions' => [
              'alias' =>  'decimal',
              'autoGroup' => true
          ]
      ]) ?>
      <?= $form->field($model, 'rate_eu')->widget(MaskedInput::classname(), [
          'clientOptions' => [
              'alias' =>  'decimal',
              'autoGroup' => true
          ]
      ]) ?>
      <?= $form->field($model, 'is_electricity_incl')->checkbox() ?>
      <?= $form->field($model, 'is_water_incl')->checkbox() ?>
    </div>
    <div class="col-lg-6">
      <?= $form->field($model, 'valid_from')->textInput() ?>
      <?php DatePicker::widget([
             'model' => $model,
             'attribute' => 'valid_from',
             //'language' => 'ru',
             'dateFormat' => 'yyyy-MM-dd',
         ]);
      ?>
  
      <?= $form->field($model, 'valid_until')->textInput() ?>
      <?php DatePicker::widget([
             'model' => $model,
             'attribute' => 'valid_until',
             //'language' => 'ru',
             'dateFormat' => 'yyyy-MM-dd',
         ]);
      ?>
  
      <?= $form->field($model, 'our_reference')->textInput(['maxlength' => 24]) ?>
  
      <?= $form->field($model, 'their_reference')->textInput(['maxlength' => 24]) ?>
  
      <?= $form->field($model, 'is_for_rent')->checkbox() ?>
  
      <?= $form->field($model, 'is_featured')->checkbox() ?>
  
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

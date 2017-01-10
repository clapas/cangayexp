<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\widgets\DatePicker;
use kartik\markdown\MarkdownEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="row">
    <div class="col-lg-6">
      <?= $form->field($model, 'title')->textInput(['maxlength' => 48, 'tabindex' => 1]) ?>
      <?= $form->field($model, 'slug')->textInput(['maxlength' => 48, 'tabindex' => 3]) ?>
      <?= $form->field($model, 'lead_para')->textArea(['rows' => 3, 'maxlength' => 255]) ?>
    </div>
    <div class="col-lg-6">
      <?= $form->field($model, 'author')->textInput(['maxlength' => 32, 'tabindex' => 2]) ?>
      <?= $form->field($model, 'language_code')->dropDownList($languages, ['tabindex' => 4]) ?>
      <?= Html::activeLabel($model, 'post_date'); ?>
      <?php 
          if (!$model->post_date) $model->post_date = Yii::$app->formatter->asDate('now', 'MM/dd/yyyy');
          echo DatePicker::widget([
             'model' => $model,
             'attribute' => 'post_date',
             'type' => DatePicker::TYPE_COMPONENT_APPEND,
             'pluginOptions' => [
                 'autoclose' => true
             ], 'options' => [
                 'tabindex' => 5
             ]
         ]);
      ?>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <?php echo $form->field($model, 'md_content')->widget(
            MarkdownEditor::classname(), 
            ['height' => 300, 'encodeLabels' => false]
        ); ?>
      </div>
    </div>
  </div>

  <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>

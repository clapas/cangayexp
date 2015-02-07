<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
      <br>
      <div class="tab-content">
        <?php $f = 1; foreach ($languages as $code => $lang): ?>
          <div role="tabpanel" class="tab-pane <?php echo $f-->0?'active':''?>" id="title_<?= $code ?>">
	    <div class="form-group">
              <?= Html::activeLabel($model, 'titles') ?>
              <input type="text" class="form-control" name="OfferForm[titles][<?= $code ?>]" maxlength="32" value="<?= $model->titles[$code] ?>">
	    </div>
	    <div class="form-group">
              <?= Html::activeLabel($model, 'descriptions') ?>
              <textarea class="form-control" name="OfferForm[descriptions][<?= $code ?>]"><?= $model->descriptions[$code] ?></textarea>
	    </div>
          </div>
	<?php endforeach; ?>
      </div>
      <hr>
    </div>

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

    <?= $form->field($model, 'is_for_rent')->checkbox() ?>

    <?= $form->field($model, 'is_featured')->checkbox() ?>

    <?= $form->field($model, 'our_reference')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'their_reference')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

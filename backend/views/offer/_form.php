<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valid_from')->textInput() ?>
    <?php DatePicker::widget([
           'model' => $model,
           'attribute' => 'valid_from',
           //'language' => 'ru',
           //'dateFormat' => 'yyyy-MM-dd',
       ]);
    ?>

    <?= $form->field($model, 'valid_until')->textInput() ?>
    <?php DatePicker::widget([
           'model' => $model,
           'attribute' => 'valid_until',
           //'language' => 'ru',
           //'dateFormat' => 'yyyy-MM-dd',
       ]);
    ?>

    <?= $form->field($model, 'is_for_rent')->checkbox() ?>

    <?= $form->field($model, 'is_featured')->checkbox() ?>

    <?= $form->field($model, 'our_reference')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'their_reference')->textInput(['maxlength' => 24]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

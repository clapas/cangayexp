<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Site configuration');
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="page-header"><?= Html::encode($this->title) ?></h1>
<div class="config-form">
  <?php
    $form = ActiveForm::begin();
    foreach ($config as $i=> $c) {
      echo $form->field($c, "[$i]value", ['options' => ['class' => 'text-uppercase']])->label($c->name);
    }
  ?>
  <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>

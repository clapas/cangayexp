<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="offer-view">

  <div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
  </div>

  <div class="row">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="col-md-7">
      <h2><?= Yii::t('app', 'Titles') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php foreach ($model->titles as $lang => $title): ?>
        <tr>
          <td><?= $lang ?></td>
          <td><?= $title ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h2><?= Yii::t('app', 'Descriptions') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php foreach ($model->descriptions as $lang => $desc): ?>
          <tr>
            <td><?= $lang ?></td>
            <td><?= $desc ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
  
    </div>
    <div class="col-md-5">
      <h2><?= Yii::t('app', 'Details') ?></h2>
      <?= DetailView::widget([
          'model' => $model,
          'attributes' => [
              'id',
              'start_ts',
              'start_place_name',
              'start_place_map_url',
              'price_eucents',
              'capacity',
              'vacants',
          ],
      ]) ?>
    </div>
  </div>
  <h2><?= Yii::t('app', 'Pictures') ?></h2>
  <div class="row">
    <?php foreach ($model->getActivityFiles()->all() as $f): ?>
      <div class="col-xs-6 col-md-3 form-group">
        <a href="<?= $f->url ?>" class="thumbnail">
            <?= Html::tag('div', null, ['class' => 'img', 'style' => 'background-image: url(' . $f->url . ')']) ?>
        </a>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete-file', 'id' => $f->id], [
            'class' => 'btn btn-small btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
      </div>
    <?php endforeach; ?>
  </div>
  <?php 
    //echo $form->field($model, 'files[]')->fileInput(['multiple' => true]);
  ?>
  <h3><?= Yii::t('app', 'Add Pictures') ?></h3>
  <?php
    $form = ActiveForm::begin(['action' => ['upload-files', 'id' => $model->id], 'options' => ['enctype' => 'multipart/form-data']]);
    echo $form->field($model, 'files[]', ['template' => "{input}\n{hint}\n{error}"])->widget(FileInput::classname(), [
        'options' => ['multiple' => true, 'accept' => 'image/*'],
        'pluginOptions' => [
            'previewFileType' => 'image', 
            'showRemove' => false,
            'browseLabel' => Yii::t('app', 'Browse …'),
            'updloadLabel' => Yii::t('app', 'Upload'),
            'msgSelected' => Yii::t('app', '{n} files selected')
        ]
    ]);
    ActiveForm::end();
  ?>
</div>

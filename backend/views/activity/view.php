<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */

$this->title = Yii::t('app', 'Activity') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activities'), 'url' => ['activity/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="activity-view">

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
        <?php if ($model->titles) foreach ($model->titles as $lang => $title): ?>
        <tr>
          <th><?= $lang ?></th>
          <td><?= $title ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h2><?= Yii::t('app', 'Subtitles') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php if ($model->subtitles) foreach ($model->subtitles as $lang => $subtitle): ?>
        <tr>
          <th><?= $lang ?></th>
          <td><?= $subtitle ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h2><?= Yii::t('app', 'Descriptions') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php if ($model->descriptions) foreach ($model->descriptions as $lang => $desc): ?>
          <tr>
            <th><?= $lang ?></th>
            <td><?= $desc?></td>
          </tr>
        <?php endforeach; ?>
      </table>
      <h2><?= Yii::t('app', 'Itinerary') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php if ($model->itineraries) foreach ($model->itineraries as $lang => $itinerary): ?>
        <tr>
          <th><?= $lang ?></th>
          <td><?= $itinerary?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h2><?= Yii::t('app', 'Includes') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php if ($model->includeses) foreach ($model->includeses as $lang => $includes): ?>
        <tr>
          <th><?= $lang ?></th>
          <td><?= $includes?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h2><?= Yii::t('app', 'Notes') ?></h2>
      <table class="table table-bordered table-stripped">
        <?php if ($model->noteses) foreach ($model->noteses as $lang => $notes): ?>
        <tr>
          <th><?= $lang ?></th>
          <td><?= $notes?></td>
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
              'end_ts',
              'end_place_name',
              'end_place_map_url',
              'price_eucents',
              'capacity',
              'vacants',
          ],
      ]) ?>
    </div>
  </div>
  <h2><?= Yii::t('app', 'Pictures') ?></h2>
  <div class="row">
    <?php if ($model->files) foreach ($model->files as $f): ?>
      <div class="col-xs-6 col-md-3 form-group">
        <a href="<?= $f->url ?>" class="thumbnail">
            <?php $url= str_replace(' ', '%20', $f->url); echo Html::tag('div', null, ['class' => 'img', 'style' => "background-image: url($url)"]) ?>
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

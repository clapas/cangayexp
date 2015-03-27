<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Offer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]);

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
              'valid_from',
              'valid_until',
              'is_for_rent:boolean',
              'is_featured:boolean',
              'is_electricity_incl:boolean',
              'is_water_incl:boolean',
              'our_reference',
              'their_reference',
              'rate_eu',
              'commun_expenses_eu',
              'floor_area_m2',
              'zone_name',
          ],
      ]) ?>
    </div>
  </div>
  <h2><?= Yii::t('app', 'Pictures') ?></h2>
  <div class="row">
    <?php foreach ($model->getOfferFiles()->all() as $f): ?>
      <div class="col-xs-6 col-md-3 form-group">
        <a href="<?= $f->url ?>" class="thumbnail"><?= Html::img($f->url) ?></a>
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
<?php
$script = <<< JS
(function($) {
    $.fn.uniformHeight = function() {
        var minHeight   = Number.MAX_VALUE,
            min         = Math.min;

        return this.each(function() {
            minHeight = min(minHeight, $(this).height());
        }).children('img').css('max-height', minHeight);
    }
})(jQuery);
$('.thumbnail').uniformHeight();
JS;
$this->registerJs($script);
?>

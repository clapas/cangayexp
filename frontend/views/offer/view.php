<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = Html::encode($model_title);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;

echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'padding' => 0,
        'fitToView' => false,
        'openOpacity' => true,
        'maxWidth' => '100%',
        'maxHeight' => '100%',
        'prevEffect' => 'none',
        'nextEffect' => 'none',
    ]
]);

?>

<div class="page-header">
  <h1><?= Html::encode($model_title) ?></h1>
</div>

<div class="row">
  <div class="col-md-8">
  <?php 
      $md = new cebe\markdown\Markdown();
      echo $md->parse(Html::encode($model_description));
  ?>
  </div>
  <div class="col-md-4">
      <?= DetailView::widget([
          'model' => $model,
          'options' => [
              'class'=> 'table detail-view'
          ],
          'attributes' => [
              'id',
              'valid_from',
              'valid_until',
              'is_for_rent:boolean',
              'is_electricity_incl:boolean',
              'is_water_incl:boolean',
              'our_reference',
              'rate_eu',
              'commun_expenses_eu',
              'floor_area_m2',
              'zone_name',
          ],
      ]) ?>
  </div>
</div>
<hr>
<div class="row">
  <?php foreach ($model->getOfferFiles()->all() as $of): ?>
    <div class="col-xs-6 col-md-3">
      <?php echo Html::a(Html::tag('div', null, ['class' => 'img', 'style' => 'background-image: url(' . $of->url . ')']), $of->url, ['rel' => 'fancybox', 'class' => 'thumbnail']) ?>
    </div>
  <?php endforeach; ?>
</div>

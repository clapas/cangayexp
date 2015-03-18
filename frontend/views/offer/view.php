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
    <div class="row">
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
</div>
<hr>
<?php foreach ($model->getOfferFiles()->all() as $of): ?>
  <div class="col-xs-6 col-md-3">
    <?php echo Html::a(Html::img($of->url, ['class' => 'std']), $of->url, ['rel' => 'fancybox', 'class' => 'thumbnail']) ?>
  </div>
<?php endforeach; ?>

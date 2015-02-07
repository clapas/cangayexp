<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Offer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'valid_from',
            'valid_until',
            'is_for_rent:boolean',
            'is_featured:boolean',
            'our_reference',
            'their_reference',
        ],
    ]) ?>
    <h2>Titles</h2>
    <?php foreach ($model->titles as $lang => $title): ?>
        <p><?= $lang . ': ' . $title ?></p>
    <?php endforeach; ?>
    <h2>Descriptions</h2>
    <?php foreach ($model->descriptions as $lang => $desc): ?>
        <p><?= $lang . ': ' . $desc ?></p>
    <?php endforeach; ?>

    <div class="row">
      <?php foreach ($model->getOfferFiles()->all() as $f): ?>
        <div class="col-xs-6 col-md-3">
          <a href="#" class="thumbnail"><?= Html::img($f->url) ?></a>
        </div>
      <?php endforeach; ?>
    </div>
        
</div>

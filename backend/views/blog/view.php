<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\markdown\Markdown;

/* @var $this yii\web\View */
/* @var $model common\models\BlogEntry */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="blog-view">

  <div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
  </div>

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
  <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',
        'slug',
        'language_code',
        'post_date',
        'author',
        'lead_para', [
            'attribute' => 'md_content',
            'format' => 'html',
            'value' => Markdown::convert($model->md_content)
        ]
    ],
  ]); ?>
</div>


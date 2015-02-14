<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Offers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

    <div class="page-header">
      <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
	'itemView' => '_view',
	'options' => ['class' => 'row'],
	'itemOptions' => [
	    'class' => 'col-sm-6 col-md-4'
	]
    ]); ?>
</div>
<?php
Modal::begin([
    'header' => '<h2>' . Yii::t('app', 'Book this property') . '</h2>',
    'options' => ['id' => 'book_modal']
]);

echo 'Contact us at xxx@xxx.dom...';

Modal::end();
$script = <<< JS
    $('a[href=#book]').on('click', function() {
        $('#book_modal').modal('show');
    });
JS;
$this->registerJs($script);
?>

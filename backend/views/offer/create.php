<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Offer */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Offer',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'languages' => $languages,
	'zones' => $zones
    ]) ?>

</div>

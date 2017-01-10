<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlogEntry */

$this->title = Yii::t('app', 'Update {modelClass}', [
    'modelClass' => 'BlogEntry',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blogentry-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'languages' => $languages,
    ]) ?>

</div>


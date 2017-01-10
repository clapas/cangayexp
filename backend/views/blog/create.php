<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BlogEntry */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'BlogEntry',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogentry-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'languages' => $languages,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Offers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
      <?php foreach ($dataProvider->models as $offer): ?>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <?php if (isset($offer->offerFiles[0])):
                echo Html::img($offer->offerFiles[0]['url'], ['class' => 'std',]);
            else: ?>
                <img data-src="holder.js/300x300/auto/industrial" alt="...">
            <?php endif; ?>
            <div class="caption">
              <h3><?php echo isset($offer->offerTitles[0])?$offer->offerTitles[0]['title']:Yii::t('app', 'Not set') ?></h3>
              <p><?php echo isset($offer->offerDescriptions[0])?$offer->offerDescriptions[0]['md_content']:Yii::t('app', 'Not set') ?></p>
              <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>

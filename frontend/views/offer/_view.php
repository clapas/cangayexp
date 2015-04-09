<?php 
use yii\helpers\Html; 
use yii\helpers\Url; 
$viewURL = Url::to(['offer/view', 'id' => $model->id]);
?>
  <div class="thumbnail">
    <a class="img-wrapper" href="<?= $viewURL ?>">
      <?php if (isset($model->offerFiles[0])):
          echo Html::tag('div', null, ['class' => 'img', 'style' => 'background-image: url(' . $model->offerFiles[0]['url']. ')']);
      else: ?>
          <img data-src="holder.js/300x300/auto/industrial" alt="...">
      <?php endif; ?>
    </a>
    <div class="caption">
      <h3><?php echo isset($model->offerTitles[0])?$model->offerTitles[0]['title']:Yii::t('app', 'Not set') ?></h3>
      <ul class="list-unstyled">
        <li><?= Html::activeLabel($model, 'zone_name') . ': ' . $model->zone_name ?></li>
        <li><?= Html::activeLabel($model, 'floor_area') . ': ' . $model->floor_area_m2 ?> m<sup>2</sup></li>
        <li><?= Html::activeLabel($model, 'our_reference') . ': ' . $model->our_reference ?></li>
      </ul>
      <div class="btn-grp"><a href="<?= $viewURL ?>" class="btn btn-primary" role="button"><?= Yii::t('app', 'View') ?></a> <a href="#book" class="btn btn-default" role="button"><?= Yii::t('app', 'Book') ?></a></div>
    </div>
</div>

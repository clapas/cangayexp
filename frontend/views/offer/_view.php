<?php 
use yii\helpers\Html; 
use yii\helpers\Url; 
?>
  <div class="thumbnail">
    <?php if (isset($model->offerFiles[0])):
        echo Html::img($model->offerFiles[0]['url'], ['class' => 'std',]);
    else: ?>
        <img data-src="holder.js/300x300/auto/industrial" alt="...">
    <?php endif; ?>
    <div class="caption">
      <h3><?php echo isset($model->offerTitles[0])?$model->offerTitles[0]['title']:Yii::t('app', 'Not set') ?></h3>
      <p><?php echo isset($model->offerDescriptions[0])?$model->offerDescriptions[0]['md_content']:Yii::t('app', 'Not set') ?></p>
      <p><a href="<?= Url::to(['offer/view', 'id' => $model->id]) ?>" class="btn btn-primary" role="button"><?= Yii::t('app', 'View') ?></a> <a href="#book" class="btn btn-default" role="button"><?= Yii::t('app', 'Book') ?></a></p>
    </div>
</div>

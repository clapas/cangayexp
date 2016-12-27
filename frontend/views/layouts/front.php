<?php 

use yii\widgets\Breadcrumbs;
use frontend\widgets\Alert;

$this->beginContent('@app/views/layouts/main.php');
?>

<div class="navbar-filler"></div>
<div class="bg"></div>
<div class="jumbotron container text-center">
  <h1><?=Yii::t('app', 'Live new experiences')?></h1>
  <p class="lead"><?=Yii::t('app', 'Alternative activities in the Canary Islands: speleo, hiking, canyoing, sports, expositions, skydiving, partying, etc.')?></p>
</div>

<?php echo $content; ?>

<?php $this->endContent(); ?>

<?php 

use yii\widgets\Breadcrumbs;
use frontend\widgets\Alert;

$this->beginContent('@app/views/layouts/main.php');
?>

<div class="container">
<?php echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);
Alert::widget();
?>
<?php echo $content; ?>
</div>

<?php $this->endContent(); ?>

<?php
/* @var $this yii\web\View */
$this->title = 'Canary Gay Experience';
use yii\helpers\Html;
use yii\helpers\Url;
?>

  <div class="container">

    <div class="panel panel-default">
      <div class="panel-heading"><?=Yii::t('app', 'Upcoming activity')?></div>
      <div class="panel-body row activity">
        <?= $this->render('/activity/_full_view', ['activity' => $activity]) ?>
      </div>
    </div>

    <h2 class="text-center join-us"><?=Yii::t('app', 'Join us and live an unforgettable experience')?></h2>

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead1.jpg')?>" class="img-responsive img-rounded">
        <h3><?=Yii::t('app', 'Conoce nuestra historia')?></h3>
        <p>Viaja a través del tiempo y conoce la historia de Canarias, cómo se formaron las islas, cómo vivían los aborígenes y los diferentes períodos tras las conquista. Visita el barrio de Vegueta y escucha lo que sus empedradas calles te cuentan sobre Colón o sus historias de piratas.</p>
        <a class="btn btn-default" href="#"><?=Yii::t('app', 'More Info')?></a>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead2.jpg')?>" class="img-responsive img-rounded">
        <h3><?=Yii::t('app', 'Descubre rincones de Gran Canaria')?></h3>
        <p>Explora el interior de la isla y podrás descubrir pequeños monumentos naturales, disfrutar de parajes únicos, conectar con la naturaleza y vivir un día de aventuras con nuestras experiencias. Descubre otras formas de vivir nuestra costa con nuestras actividades acuáticas.</p>
        <a class="btn btn-default" href="#"><?=Yii::t('app', 'More Info')?></a>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <img src="<?=Url::to('@web/img/subhead3.jpg')?>" class="img-responsive img-rounded">
        <h3><?=Yii::t('app', 'Déjate llevar por los sabores de Canarias')?></h3>
        <p>Sumergente en nuestros intensos sabores, disfruta de una isla llena de aromas y colores. Prueba nuestras "papas arrugás" con mojo picón, cata nuestros quesos y vinos, saborea el gofio en las diversas creaciones culinarias. Llévate un buen sabor de boca de Gran Canaria.</p>
        <a class="btn btn-default" href="#"><?=Yii::t('app', 'More Info')?></a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

  </div>

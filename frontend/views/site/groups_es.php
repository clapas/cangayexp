<?php
use yii\helpers\Url;
$this->title = 'Canary Gay Experience - Ofertas de grupo';
?>
<div class="container">
<h1 class="page-header text-center">Precios y ofertas de grupo</h1>
<p>Si tienes un grupo de mínimo 4 personas y quieren realizar una actividad fuera de las fechas previstas en nuestro <a target="_blank" href="<?=Url::to(['/activity/index'])?>">calendario</a> envíanos una <a href="<?=Url::to(['site/request'])?>">solicitud de actividad</a> y buscamos juntos una fecha para su realización.</p>

<p>Explícanos en detalle qué quieres, para que te hagamos la propuesta más personalizada y adecuada posible: tamaño del grupo, edades, nivel deseado, experiencia previa, evento sorpresa, cumpleaños, despedida de solter@, etc.</p>

<p>¡Ojo! Algunas de las actividades tiene un mínimo de 10 o 12 personas. Descárgate aquí <a target="_blank" href="<?=Yii::$app->params['catalog_url']?>">nuestro catálogo</a> para hacerte una idea.
</div>

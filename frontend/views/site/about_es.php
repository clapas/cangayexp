<?php 
use yii\helpers\Url;
use yii\widgets\ListView;
$this->title = 'Canary Gay Experience - Sobre nosotros';
?>
<div class="container">
<div class="row">
  <div class="col-md-offset-3 col-md-6">
    <h1 class="page-header text-center">Sobre nosotros</h1>
    <p><span class="can-gay-exp">Canary Gay Experience</span> nace como empresa para satisfacer las necesidades del turista homosexual que nos 
    visita, ofreciendo actividades con las que poder conocer la isla con otros miembros del colectivo LGTB. Además, surge con el fin de dar alternativas reales al turismo de playa y vida nocturna.
    <p>Somos una empresa joven, emprendedora y conectada con las redes, que quiere difundir la cultura, historia, belleza y gastronomía de nuestra isla, ofreciendo una amplia gama de experiencias de ocio y cultura, en contacto directo con la naturaleza.</p>
    <p>Para ello, además de las experiencias que están actualmente en nuestro catálogo, estamos ultimando detalles para nuevas actividades en las que se podrá probar nuestra gastronomía, ver atardeceres en barco o cabalgar a caballo. También se podrá conocer mejor la historia de Canarias y visitar nuestros museos o salas de arte.</p>
    <p>También queremos comprometernos con nuestra tierra trabajando y colaborando con empresas canarias y 
    promoviendo así el desarrollo de la economía local.</p>
    <p>Todo esto llevado a cabo en un entorno de tolerancia, respeto y libertad ante todos los miembros del colectivo LGTB y simpatizantes.</p>
    
    <p>¡¡Conoce la isla con <span class="can-gay-exp">Canary Gay Experience</span>!!</p>
  </div>
    <div class="col-md-3">
      <div class="list-group activities">
        <div class="list-group-item list-group-item-info">
          <h4><?=Yii::t('app', 'Upcoming activities')?></h4>
        </div>
      <?php
      echo ListView::widget([
          'dataProvider' => $upcoming_activities,
          'emptyText' => '<div class="list-group-item">' . Yii::t('yii', 'No results found.') . '</div>',
          'summary' => false,
          'itemView' => '/blog/_activity_view',
          'options' => ['tag' => false],
          'itemOptions' => ['tag' => false]
      ]); ?>
      </div>
    </div>
  <div class="col-md-offset-3 col-md-6">
    <img class="img img-responsive" src="<?=Url::to('@web/img/about_canarygayexperience.jpg')?>">
  </div>
  
  <div class="col-md-offset-3 col-md-6">
    <h2>Experiencias para grupos reducidos</h2>
    <p><span class="can-gay-exp">Canary Gay Experience</span> se encargará de hacer tu paso por la isla diferente, en contacto con la naturaleza y la cultura de nuestra tierra, haciendo que vivas experiencias únicas.</p>
  
    <ul>
    <li>En la gran mayoría de nuestras actividades recogemos a nuestros clientes en el lugar de hospedaje o en puntos de encuentro, sin coste adicional.</li>
  
    <li>Los horarios suelen ser matutinos, normalmente desde las 9:00 hasta las 14:00 o 15:00. Aunque en verano algunas de las experiencias podrán realizarse también en horario de tarde.</li>
  
    <li>Proporcionamos todo el material de seguridad homologado necesario para realizar nuestras actividades.</li>
  
    <li>Muchas de nuestras experiencias irán acompañadas de un pequeño picnic a base de frutas de la tierra, galletas y agua. Otras incluyen la comida.</li>
  
    <li>Contamos con seguros de responsabilidad civil y accidentes para la seguridad de nuestros clientes.</li>
    </ul>
  
    <p>Normalmente trabajamos con grupos reducidos para poder dar una mejor calidad de servicio. Con ellos mantendremos un trato más cercano y un entorno cordial y tolerante. Se harán explicaciones sobre el entorno: flora, fauna, cultura, gastronomía, etc, en inglés y español.</p>
  </div>
</div>

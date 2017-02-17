<?php 
use yii\helpers\Url;

$this->title = 'Canary Gay Experience - Nuestras actividades';
$catalogUrl = Url::to(['activity/index']);
$lead_para = 'Nos encargamos de hacer tu paso por la isla diferente, en contacto con la naturaleza y la cultura de nuestra tierra, haciendo que vivas experiencias únicas';
?>
<div class="container">
  <h1 class="text-center page-header">Actividades</h1>
  <!---->
  <p class="text-center lead"><?=$lead_para?></p>
  <div class="row well activities">
    <div class="col-md-6 activity activity-hiking">
      <div class="activity-header">
        <h2>Senderismo</h2>
        <p class="lead">La mejor manera de conocer todos los rincones secretos de la isla.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Caminando podemos acceder a paisajes con contrastes. Ver cascadas de agua dentro de un bosque de laurisilva o adentrarse en un cañón desértico donde las paredes verticales nos muestran caprichosas formas y cuevas con centenarios cactus gigantes.</p> 
        <p>Tenemos varios itinerarios diseñados por su espectacularidad y originalidad ofreciendo paisajes atractivos. Los únicos requisitos que tiene que cumplir el participante son: no tener excesivo miedo a las alturas o vértigo, independientemente de la edad que tenga.</p>
    </div>
    <div class="col-md-6 activity activity-canyon">
      <div class="activity-header">
        <h2>Barranquismo</h2>
        <p class="lead">¡Caminar, saltar, trepar, descender, nadar, rapelar y disfrutar!</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Actividad de aventura que consiste en descender por un barranco o cañón, siguiendo el curso del agua, donde se combinan diferentes ejercicios como: caminar, saltar, destrepar, nadar, rapelar y disfrutar! Vamos equipados con traje de neopreno, casco y equipos de protección individual (arnés, mosquetón y ocho)</p>
      <p>Lo único que necesita una persona para realizar esta actividad, es: zapatillas deportivas (que se van a mojar) y otro calzado para cambiarse, bañador y toalla.</p>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 activity activity-kayak">
      <div class="activity-header">
        <h2>Kayak</h2>
        <p class="lead">Ama a muchos, confía en pocos, pero siempre rema en tu kayak.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Se trata de una relajada y placentera navegación en kayaks dobles. La ruta que hemos diseñado se realiza por la costa sur, que nos ofrece seguridad y buen tiempo.</p>
      <p>Normalmente iniciamos el recorrido en Arguineguín, para visitar un yacimiento arqueológico, el cuál interpretamos, y varias calas, hasta llegar a la gran playa de Montaña Arena, donde descansamos y dedicamos tiempo para hacer juegos, admirar los fondos submarinos o tomar el sol.</p>
    </div>
    <div class="col-md-6 activity activity-surf">
      <div class="activity-header">
        <h2>Surf</h2>
        <p class="lead">Es fácil divertirse cuando tienes arena, olas y sol.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Si te gusta el mar y las olas, no dejes atrás la oportunidad de surfear nuestras costas. Nuestros instructores te enseñarán a disfrutar del mar como nunca habías imaginado, en un entorno profesional, seguro y superdivertido.</p>
      <p>Además de navegar algunas olas, en las clases recibiras información importante sobre seguridad y emergencias, entrenamiento en la técnica del surf, y haremos calentamiento y estiramientos.</p>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 activity activity-coastering">
      <div class="activity-header">
        <h2>Coastering</h2>
        <p class="lead">Una aventura divertida, refrescante y apta para todas las edades, públicos y niveles.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Un recorrido por acantilados marinos en donde tendremos saltos al agua desde diferentes alturas, una tirolina que cruza una cueva y termina en el mar, una vía ferrata por encima de las olas y rápeles hasta el mar directamente, todo ello alternado con tramos de nado y visitas a cuevas.</p>
      <p>Se trata de una actividad alternativa y una de nuestras actividades estrella, posiblemente la más divertida, completa y original.</p>
    </div>
    <div class="col-md-6 activity activity-scubadiving">
      <div class="activity-header">
        <h2>Submarinismo</h2>
        <p class="lead">El mismo planeta, un mundo diferente.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Según el nivel acreditado del aventurero:</p>
      <ul>
        <li><em>Open Water Diver</em> (OWD): para bucear sin supervisión hasta la profundidad máxima de 40m.</li>
        <li><em>Advanced Diver</em>: continuación de OWD y especialidades de buceo.</li>
        <li>Inmersiones: los <em>Advanced Divers</em> podrán disfrutar de dos inmersiones en diferentes puntos de la isla.</li>
      </ul>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 activity activity-skydiving">
      <div class="activity-header">
        <h2>Paracaidismo</h2>
        <p class="lead">Aquellos que no salten, jamás sabrán lo que es volar.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>¡Esta si que es una auténtica experiencia no apta para cardíacos!</p>
      <p>Disfruta del maravilloso paisaje de Gran Canaria durante un vuelo de 20 minutos y realiza un salto en Tándem con uno de nuestros instructores.</p>
      <p>Vive la increíble sensación de la caída libre de 45 segundos desde 3000m de altura, algo que hasta hace poco estaba sólo al alcance de un experimentado paracaidista.</p>
      <p>Tras un fascinante descenso aterriza suavemente sobre las dunas de Maspalomas.</p>
    </div>
    <div class="col-md-6 activity activity-schooner">
      <div class="activity-header">
        <h2>Paseo en goleta</h2>
        <p class="lead">Surcar el azul del Atlántico, en un entorno privilegiado y con todo el espíritu de la época dorada de la navegación.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">Ver programadas</a>
      </div>
      <p>Si tienes un espíritu romántico y aventurero, te invitamos a vivir una experiencia realmente evocadora. Ven con nosotros y déjate llevar en un viaje de ensueño a bordo del <em>Mondragon</em>.</p>
      <p>Navegaremos por la costa sur de la isla, seduciéndote con el paisaje de sus apartadas playas y calas, sus acantilados y cuevas. Verás la isla con otros ojos y podrás tomar el sol, nadar y bucear con snorkel.</p>
      <p>Con capacidad para 12 personas, garantizamos un trato exclusivo y único.</p>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <?= $this->render('/site/_share_buttons', ['url' => Url::to('', true), 'title' => Yii::t('app', 'Alternative activities in the Canary Islands: speleo, hiking, canyoing, sports, expositions, skydiving, partying, etc.'), 'description' => $lead_para]) ?>
  </div>
</div>

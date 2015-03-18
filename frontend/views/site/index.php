<?php
/* @var $this yii\web\View */
$this->title = 'LivingTheSunset';
?>
<div class="container-fluid masthead">
  <div class="row">
    <div class="col-md-2 visible-lg-block visible-md-block">
      <?php echo $this->render('/site/_location_nav') ?>
    </div>
    <div class="col-md-8 col-xs-12">
      <?php 
      use yii\helpers\Html;
      use yii\bootstrap\Carousel;
      use yii\helpers\Url;
      echo Carousel::widget([
          'items' => [
              ['content' => '<img src="' . Url::to('@web/img/slideshow1.jpg') . '">', 'caption' => '<h4>Primer título</h4><p>Este es el primer texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow2.jpg') . '">', 'caption' => '<h4>Segundo título</h4><p>Este es el segundo texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow3.jpg') . '">', 'caption' => '<h4>Tercer título</h4><p>Este es el tercer texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow4.jpg') . '">', 'caption' => '<h4>Cuarto título</h4><p>Este es el cuarto texto</p>'],
              ['content' => '<img src="' . Url::to('@web/img/slideshow5.jpg') . '">', 'caption' => '<h4>Quinto título</h4><p>Este es el quinto texto</p>'],
          ],
          'controls' => [
              '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
              '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
          ]
      ]); ?>
    </div>
    <div class="col-xs-12 visible-xs-block visible-sm-block">
      <br>
      <?php echo $this->render('/site/_location_nav') ?>
    </div>
  </div>
</div>

<div class="jumbotron">
  <h1>Living In The Sunset</h1>
  <div class="row">
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-home"></i>
      <h3><?= Yii::t('app', 'Our Mission') ?></h3>
      <p>Living In The Sunset&reg; es el fruto de una colaboración directa entre 
        diferentes profesionales, especializados en los sectores de la 
        abogacía y del turismo, con cooperadores en países nórdicos entre otros. 
        Marcamos la diferencia ofreciendo un servicio jurídico directo sin intermediarios para 
        que el cliente pueda disponer en todo momento de la información 
        necesaria respecto a las tramitaciones contratadas.</p>
    </div>
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-heart"></i>
      <h3><?= Yii::t('app', 'Our Offering') ?></h3>
      <p>Living In The Sunset&reg; tiene una estructura sólida y de principios 
        asentados, destacándonos  del resto de opciones como la óptima 
        solución garantizando la eficiencia, seriedad y seguridad de un servicio 
        jurídico directo, sin intermediaciones inmobiliarias desconocedoras de 
        ciertas materias exclusivamente jurídicas, que a través de nuestro 
        servicio pueden ser resueltas inmediatamente.</p>
    </div>
    <div class="col-sm-4">
      <i class="glyphicon glyphicon-picture"></i>
      <h3><?= Yii::t('app', 'Your Benefits') ?></h3>
      <p>En caso de optar por nuestra opción, no tendrá que preocuparse por 
        realizar trámites y gestiones burocráticas, sea de índole administrativa, 
        notarial, registral, liquidadora o cualquier otra dado que el servicio 
        ofrecido es íntegro, siendo el cliente la pieza fundamental en todo 
        caso. Inclusive ofrecemos un servicio jurídico post venta, mediante el 
        cual ofrecemos la posibilidad a nuestros clientes de no tener que 
        buscar asesoramiento en otros profesionales</p>
    </div>
  </div>
</div>

<div class="site-index">

  <div class="body-content container">

    <div class="title">
      <h1><?= Yii::t('app', 'Services') ?></h1>
      <p class="lead text-center">Le damos la bienvenida y opte por el confort que le ofrecemos en uno 
      de los lugares más privilegiados del mundo.</p>
      <p class="lead text-center">Existe una numerosa lista de colaboraciones externas en virtud de las 
        cuales, en calidad de intermediario turístico, podrá disponerse de 
        numerosos servicios para garantizar su tranquilidad. Estos servicios 
        podrán ser ofrecidos bajo petición y precio del servicio a consultar.</p>
      <p class="lead text-center">Gracias a una amplia experiencia en el sector turístico, podemos 
        proporcionar los mejores servicios y la máxima calidad a nuestros 
        clientes, así que, cualquier opción que elija, sea bienvenido y 
        asegúrese de llevarla a buen término con todas las facilidades y 
        comodidades que prestamos. Igualmente, es la primera opción de 
        reserva vacacional por larga, media o corta temporada dado el servicio 
        de intermediación turística que se ofrece.</p>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_62976403.jpg', ['class' => 'img-responsive']) ?>
            <a name="excursions"></a>
            <h3><?= Yii::t('app', 'Excursions') ?></h3>
            <p>Contamos con diversas entidades y profesionales del ocio encargados 
              de organizar el tiempo libre de nuestros clientes para su máximo 
              disfrute de adultos, adolescentes y más pequeños. El 
              objetivo es el disfrute de todos y acumular buenos recuerdos del 
              periodo vacacional en nuestra isla y en las demás islas.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_208840960.jpg', ['class' => 'img-responsive']) ?>
            <a name="cooker"></a>
            <h3><?= Yii::t('app', 'Cooker') ?></h3>
            <p>Siempre es agradable poder disfrutar un bocado exquisito y en caso, 
              de no tener tomada la decisión le ofrecemos un amplio abanico de 
              posibilidades respecto a cocinas de todo tipo, a nivel internacional, 
              nacional y local, así como la disposición de un servicio personalizado a 
              la carta.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_172154483.jpg', ['class' => 'img-responsive']) ?>
            <a name="baby_sitter"></a>
            <h3><?= Yii::t('app', 'Baby Sitter') ?></h3>
            <p>Los hijos son parte fundamental en unas vacaciones familiares, y 
              aunque son lo más amado, a veces no viene mal que los padres 
              descansen del ajetreo doméstico, es por lo que es de suma 
              importancia poder optar por una persona de confianza, amable y 
              capaz de empatizar con los pequeños.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_94199572.jpg', ['class' => 'img-responsive']) ?>
            <a name="chauffeur"></a>
            <h3><?= Yii::t('app', 'Chauffeur') ?></h3>
            <p>Ofrecemos la posibilidad de trasladar nuestros clientes desde el 
              aeropuerto a su destino vacacional, así mismo, tenemos 
              colaboradores que proporcionan alquiler de vehículos, motocicletas, 
              bicicletas y otros. Se podrá optar por el acompañamiento de los 
              clientes bajo petición del servicio.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_182239871.jpg', ['class' => 'img-responsive']) ?>
            <a name="touristic_guide"></a>
            <h3><?= Yii::t('app', 'Touristic Guide') ?></h3>
            <p>Siempre es más cómodo tener una persona local que pueda 
              reseñarnos los lugares más emblemáticos y los parajes de los cuales 
              puedan disfrutar nuestros visitantes.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_122048368.jpg', ['class' => 'img-responsive']) ?>
            <a name="arranged_events"></a>
            <h3><?= Yii::t('app', 'Arranged Events') ?></h3>
            <p>Colaboramos con diversas empresas y profesionales que nos permiten 
              organizar todo tipo de reuniones y celebraciones al gusto del cliente, 
              así como una orientación y asesoramiento personalizado para ello. No 
              dude dejar en mano de profesionales del sector cualquier tipo de 
              proyecto.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_171931424.jpg', ['class' => 'img-responsive']) ?>
            <a name="cleaning"></a>
            <h3><?= Yii::t('app', 'Cleaning') ?></h3>
            <p>Siempre se da un trato preferencial en el servicio de limpieza para 
              ofrecer espacios limpios y acordes a las exigencias de higiene y 
              sanitarias para total comodidad de los clientes.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box">
          <div class="service">
            <?= Html::img('@web/img/shutterstock_62913607.jpg', ['class' => 'img-responsive']) ?>
            <a name="personal_shopper"></a>
            <h3><?= Yii::t('app', 'Personal Shopper') ?></h3>
            <p>A veces se nos hace difícil la toma de decisiones que podemos 
              entender como poco relevantes pero que resultan ser decisivas, para 
              ello ponemos a su disposición personal cualificado que pueda 
              ofrecerle el servicio óptimo en diversos aspectos.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

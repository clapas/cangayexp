<?php
use kartik\markdown\Markdown;
use yii\helpers\Html;

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 blog-index">
        <h1>> Blog</h1>
        <div class="blog-index-entry blog-index-entry-n1">
          <h2 >Relocated to San Francisco</h2>
          <span class="date">28 oct 2016</span>
        </div>
        <div class="blog-index-entry blog-index-entry-n2">
          <h2>Dynamic Bezier Lines</h2>
          <span class="date">28 oct 2016</span>
        </div>
        <div class="blog-index-entry blog-index-entry-n3">
          <h2>Transition and old browsers</h2>
          <span class="date">28 oct 2016</span>
        </div>
        <div class="blog-index-entry blog-index-entry-n4">
          <h2>A nice recursion example</h2>
          <span class="date">28 oct 2016</span>
        </div>
        <div class="blog-index-entry blog-index-entry-n5">
          <h2>Welcome minimal monkey</h2>
          <span class="date">28 oct 2016</span>
        </div>
        <div class="blog-index-entry blog-index-entry-n6">
          <h2>CSS3 Animation Effects</h2>
          <span class="date">28 oct 2016</span>
        </div>
        <nav aria-label="...">
          <ul class="pager">
            <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Anteriores</a></li>
            <li class="next"><a href="#">Posteriores <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
        </nav>
    </div>
    <div class="col-md-6 blog-entry">
      <h1><?=$model->title?></h1>
      <span class="date"><?=$model->post_date?></span><br>
      <?=Yii::t('app', 'By')?> <span class="author"><?=$model->author?></span><br><br>
      <p class="lead"><?=$model->lead_para?></p>
      <?=Markdown::convert($model->md_content);?>
      <img src="../dummy_social_plugin.png" class="img-responsive">
      <hr>
      <nav aria-label="...">
          <ul class="pager">
            <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Anteriores</a></li>
            <li class="next"><a href="#">Posteriores <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
      </nav>
    </div>
    <br class="visible-xs-block visible-sm-block">
    <div class="col-md-3">
      <div class="list-group activities">
        <div class="list-group-item list-group-item-info">
          <h4>Próximas actividades</h4>
        </div>
        <a href="#" class="list-group-item">
          <span class="date">28 nov 2016</span>
          <h4 class="list-group-item-heading">Submarinismo</h4>
          <p class="list-group-item-text">Inmersión con botella en la Playa del Cabrón</p>
        </a>
        <a href="#" class="list-group-item">
          <span class="date">08 dic 2016</span>
          <h4 class="list-group-item-heading">Escalada</h4>
          <p class="list-group-item-text">Estilo libre en montaña de roca</p>
        </a>
        <a href="#" class="list-group-item">
          <span class="date">17 ene 2017</span>
          <h4 class="list-group-item-heading">Surf</h4>
          <p class="list-group-item-text">Iniciación en San Andrés</p>
        </a>
      </div>
    </div>
  </div>
</div>

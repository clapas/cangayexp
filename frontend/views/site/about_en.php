<?php 
use yii\helpers\Url;
use yii\widgets\ListView;
$this->title = 'Canary Gay Experience - About us';
?>
<div class="container">
<div class="row">
  <div class="col-md-offset-3 col-md-6">
    <h1 class="page-header text-center">About us</h1>
    <p><span class="can-gay-exp">Canary Gay Experience</span> born as a company to meet the needs of gay tourists who visit us, offering activities with which to explore the island with other members of the LGBT community. Also arises in order to provide real beach tourism and nightlife options.</p>
    <p>We are a young, entrepreneurial company and connected networks, which wants to spread the culture, history, beauty and cuisine of our island, offering a wide range of leisure and culture, direct contact with nature.</p>
    <p>To do this, we are currently preparing different activities that you can cross on foot over the island, try our cuisine, dive into the ocean depths, watch sunsets boat or horseback riding. It also can learn more about the history of our island and visit our museums or art galleries.</p>
    <p>We also want to engage with our land working and collaborating with local businesses and thus promoting the development of the local economy.</p>
    <p>All this done in an environment of tolerance, respect and freedom to all members of the LGBT community and supporters.</p>
    <p>Meet the island with <span class="can-gay-exp">Canary Gay Experience</span>!!</p>
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
          'itemView' => '_activity_view',
          'options' => ['tag' => false],
          'itemOptions' => ['tag' => false]
      ]); ?>
      </div>
    </div>
  <div class="col-md-offset-3 col-md-6">
    <img class="img img-responsive" src="<?=Url::to('@web/img/about_canarygayexperience.jpg')?>">
  </div>
  
  <div class="col-md-offset-3 col-md-6">
    <h2>Activities for small groups</h2>
    <p><span class="can-gay-exp">Canary Gay Experience</span> will take care of your visit to the island different, in contact with nature and culture of our land.</p>
  
    <ul>
    <li>We collect our customers in the place of lodging, free of charge.</li>
    <li>Times are usually morning, usually from 9:00 to 14:00 to 15:00. Even in summer some of the activities may also be performed in the afternoon.</li>
    <li>We provide all necessary safety equipment approved for our activities.</li>
    <li>Many of our activities shall be accompanied by a small picnic fruit of the earth, biscuits and water. Other activities include food.</li>
    <li>We have liability insurance and accident insurance for the safety of our customers.</li>
    </ul>
    <p>We always work in small groups to give better quality. With them keep a closer attention and a friendly and tolerant environment. Flora, fauna, culture, gastronomy, etc, in English and Spanish: explanations on the environment will be given. Some activities are possible in other languages.
    .</p>
  </div>
</div>

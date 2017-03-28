<?php 
use yii\helpers\Url;

$this->title = 'Canary Gay Experience - Our activities';
$catalogUrl = Url::to(['activity/index']);
$lead_para = 'We will take care of making your way through the island something different, in contact with the nature and culture of our land, delivering unique life experiences to you';
?>
<div class="container">
  <h1 class="text-center page-header"><?=Yii::t('app', 'Activities')?></h1>
  <!---->
  <p class="text-center lead"><?=$lead_para?></p>
  <div class="row well activities">
    <div class="col-md-6 activity activity-hiking">
      <div class="activity-header">
        <h2>Trekking</h2>
        <p class="lead">The best way to get to know all the secret places of the island.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>Walking we can access landscapes with contrasts. Watch the waterfalls inside a laurel forest or venture into a desert canyon where vertical walls do not show capricious shapes and caves with giant cactus centenaries.</p> 
        <p>We have several itineraries designed for its spectacularity and originality to offer attractive landscapes. The only requirements you have to meet are: do not be overly fearful of heights or vertigo, regardless of how old you are.</p>
    </div>
    <div class="col-md-6 activity activity-canyon">
      <div class="activity-header">
        <h2>Canyoning</h2>
        <p class="lead">walking, jumping, uncorking, swimming, abseiling and enjoy!</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>Adventure activity that moves in a ravine or canyon, following the course of the water, where you will practice different exercises.</p>
      <p>We will be equipped with neoprene suit, helmet and personal protective equipment (harness, carabiner and eight). The only requirements you have to meet are: running shoes (that leave a damp) and other shoes to change, bathing suit and towel.</p>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 activity activity-kayak">
      <div class="activity-header">
        <h2>Kayak</h2>
        <p class="lead">Love many, trust few, but always paddle your own canoe!</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>It is a relaxed and pleasant sailing in double kayaks. The route we have designed is done by the south coast, which offers us safety and good weather.</p>
      <p>Normally we begin the tour in Arguineguín, to visit an archaeological site, which we interpret, and several coves, until arriving at the great beach of Montaña Arena, where we rest and we dedicate time to make games, to admire the submarine floors or to take the sun.</p>
    </div>
    <div class="col-md-6 activity activity-surf">
      <div class="activity-header">
        <h2>Surf</h2>
        <p class="lead">It is easy to have fun when you have sand, waves and sun.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>If you love the sea and the waves, do not leave behind the opportunity to surf our coasts. Our instructors will teach you to enjoy the sea like you never imagined, in a professional, safe and super-fun environment.</p>
      <p>In addition to surfing some waves, in the classes you will receive important information about safety and emergencies, training in the technique of surfing, and we will do warming up and stretching.</p>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 activity activity-coastering">
      <div class="activity-header">
        <h2>Coastering</h2>
        <p class="lead">A fun adventure, refreshing and suitable for all ages, public and levels.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>A tour through sea cliffs where we will have jumps to the water from different heights, a zip-line that crosses a cave and ends in the sea, a via ferrata above the waves and rapeles to the sea directly, all this alternated with stretches of swimming and Visits to caves.</p>
      <p>It is an alternative experience and one of our star activities, possibly the most fun, complete and original.</p>
    </div>
    <div class="col-md-6 activity activity-scubadiving">
      <div class="activity-header">
        <h2>Scuba diving</h2>
        <p class="lead">The same planet, a different world.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>According to the accredited level of the adventurer:</p>
      <ul>
        <li><em>Open Water Diver</em> (OWD): for unsupervised dive to a maximum depth of 40m.</li>
        <li><em>Advanced Diver</em>: continuation of OWD and diving specialties.</li>
        <li><em>Dives</em>: <em>Advanced Divers</em> can enjoy two dives in different points of the island.</li>
      </ul>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 activity activity-skydiving">
      <div class="activity-header">
        <h2>Paracaidismo</h2>
        <p class="lead">Those who don't jump will never fly.</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>This is an experience for true adventurers!</p>
      <p>Enjoy the wonderful scenery of Gran Canaria during a 20 minute flight and make a jump in tandem with one of our instructors.</p>
      <p>Experience the incredible 45-second free fall from 3000m, something that until recently was only within the reach of an experienced parachutists.</p>
      <p>After a fascinating descent it lands smoothly on the dunes of Maspalomas.</p>
    </div>
    <div class="col-md-6 activity activity-schooner">
      <div class="activity-header">
        <h2>Goleta tour</h2>
        <p class="lead">Surf the Atlantic blue, in a privileged environment and with all the spirit of the golden age of navigation..</p>
        <a href="<?=$catalogUrl?>" class="btn btn-primary">See schedule</a>
      </div>
      <p>If you have a romantic and adventurous spirit, we invite you to live a truly evocative experience. Come with us and let yourself go on a dream trip aboard the <em>Mondragon</em>.</p>
      <p>We will sail along the south coast of the island, seducing you with the landscape of its secluded beaches and coves, cliffs and caves. You will see the island with other eyes and you can sunbathe, swim and snorkel..</p>
      <p>With capacity for 12 people, we guarantee an exclusive and unique treatment.</p>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <?= $this->render('/site/_share_buttons', ['url' => Url::to('', true), 'title' => Yii::t('app', 'Alternative activities in the Canary Islands: speleo, hiking, canyoing, sports, expositions, skydiving, partying, etc.'), 'description' => $lead_para]) ?>
  </div>
</div>


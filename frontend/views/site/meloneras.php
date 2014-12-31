<?php
/* @var $this yii\web\View */
$this->title = 'LivingTheSunset';
?>
<div class="container-fluid masthead">
  <div class="row">
    <div class="col-md-2 visible-lg-block visible-md-block">
    <?php echo $this->render('/site/_location_nav', ['active' => ['meloneras' => true]]) ?>
    </div>
    <div class="col-md-10 property-list">
      <div class="row">
        <?php 
        $pp = [
            [
                'title' => 'Magnífico apartamento',
                'description' => 'Vivamus ultrices dolor quis tempus lobortis. Vivamus lacus magna, commodo eget semper interdum, lacinia ut tortor. Suspendisse potenti.'
            ],
            [
                'title' => 'Céntrica habitación',
                'description' => 'Etiam euismod tincidunt tempor. Nulla vestibulum varius nunc, sed sagittis ante eleifend in. Quisque eu leo gravida, dictum lacusi.'
            ],
            [
                'title' => 'Acogedora casita',
                'description' => 'Nunc ligula enim, porta in consectetur eget, semper quis libero. Quisque eget nunc turpis. Pellentesque porta pellentesque rutrum.'
            ],
            [
                'title' => 'Grandioso chalet',
                'description' => 'Aliquam fringilla tempor consequat. Sed nec gravida lacus, sagittis blandit nisi. Praesent varius aliquet congue. Nulla et molestie nibh, a venenatis mauris.'
            ],
            [
                'title' => 'Lujosa mansión',
                'description' => 'Sed varius vitae neque nec pretium. Sed et sem ac magna tempor imperdiet. In rutrum turpis sit amet dolor dictum viverra.'
            ],
            [
                'title' => 'Espectacular piso',
                'description' => 'Nulla facilisi. Suspendisse non magna ac sem sagittis vehicula. Praesent malesuada ante sit amet elit cursus, a laoreet ligula commodo.'
            ],
            [
                'title' => 'Maravillosa villa',
                'description' => 'Donec vitae erat fermentum, condimentum nunc ac, aliquam nibh. Fusce interdum ex nec tortor porta, et pellentesque nulla dapibus.'
            ]
        ];
        foreach ($pp as $p): ?>
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img data-src="holder.js/300x300/auto/industrial" alt="...">
              <div class="caption">
                <h3><?php echo $p['title']?></h3>
                <p><?php echo $p['description']?></p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div> 
    </div>
  </div>
</div>

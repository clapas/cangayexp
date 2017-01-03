<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivityItineraryFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivityItinerary';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

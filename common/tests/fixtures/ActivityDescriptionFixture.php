<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivityDescriptionFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivityDescription';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

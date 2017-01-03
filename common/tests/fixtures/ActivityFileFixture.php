<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivityFileFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivityFile';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

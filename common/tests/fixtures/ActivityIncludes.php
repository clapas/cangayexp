<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivityIncludesFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivityIncludes';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

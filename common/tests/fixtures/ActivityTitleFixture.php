<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivityTitleFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivityTitle';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivitySubtitleFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivitySubtitle';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

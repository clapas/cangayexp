<?php
namespace common\tests\fixtures;

use yii\test\ActiveFixture;

class ActivityNotesFixture extends ActiveFixture {
    public $modelClass = 'common\models\ActivityNotes';
    public $depends = ['common\tests\fixtures\ActivityFixture'];
}

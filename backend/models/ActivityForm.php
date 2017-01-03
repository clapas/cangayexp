<?php
namespace backend\models;

use Yii;
use common\models\Activity;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Login form
 */
class ActivityForm extends Activity
{
    public $files;
    public $titles;
    public $subtitles;
    public $descriptions;
    public $includeses;
    public $itineraries;
    public $noteses;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['files'], 'file', 'maxFiles' => 10],
            [['titles', 'subtitles', 'includeses', 'noteses', 'descriptions', 'itineraries'], 'safe'],
        ]);
    }
    public function afterFind() {
        parent::afterFind();
        $this->titles = $this->getTitlesByLang();
        $this->subtitles = $this->getSubtitlesByLang();
        $this->descriptions = $this->getDescriptionsByLang();
        $this->files = $this->getFiles()->all();
        $this->itineraries = $this->getItinerariesByLang();
        $this->noteses = $this->getNotesesByLang();
        $this->includeses = $this->getIncludesesByLang();
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'files' => Yii::t('app', 'Files'),
            'titles' => Yii::t('app', 'Title'),
            'subtitles' => Yii::t('app', 'Subtitle'),
            'noteses' => Yii::t('app', 'Notes'),
            'includeses' => Yii::t('app', 'Includes'),
            'itineraries' => Yii::t('app', 'Itinerary'),
            'descriptions' => Yii::t('app', 'Description'),
        ]);
    }
}

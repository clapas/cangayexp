<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "activity".
 *
 * @property integer $id
 * @property string $start_ts
 * @property string $end_ts
 * @property string $start_place_name
 * @property string $start_place_map_url
 * @property string $end_place_name
 * @property string $end_place_map_url
 * @property integer $price_eucents
 * @property integer $vacants
 * @property integer $capacity
 *
 * @property ActivityDescription[] $activityDescriptions
 * @property Language[] $languageCodes
 * @property ActivityIncludes[] $activityIncludes
 * @property Language[] $languageCodes0
 * @property ActivityItinerary[] $activityItineraries
 * @property Language[] $languageCodes1
 * @property ActivityNotes[] $activityNotes
 * @property ActivitySubtitle[] $activitySubtitles
 * @property Language[] $languageCodes2
 * @property ActivityTitle[] $activityTitles
 * @property Language[] $languageCodes3
 */
class Activity extends \yii\db\ActiveRecord
{
    protected $title;
    protected $subtitle;
    protected $description;
    protected $includes;
    protected $itinerary;
    protected $notes;
    public $start_weekday;
    public $start_month;
    public $start_day;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_ts', 'start_place_name', 'end_ts', 'end_place_name', 'price_eucents'], 'required'],
            [['start_ts', 'end_ts'], 'safe'],
            [['price_eucents', 'vacants', 'capacity'], 'integer'],
            [['start_place_name', 'end_place_name'], 'string', 'max' => 64],
            [['start_place_map_url', 'end_place_map_url'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'start_ts' => Yii::t('app', 'Start Timestamp'),
            'end_ts' => Yii::t('app', 'End Timestamp'),
            'start_place_name' => Yii::t('app', 'Start Place Name'),
            'start_place_map_url' => Yii::t('app', 'Start Place Map URL'),
            'end_place_name' => Yii::t('app', 'End Place Name'),
            'end_place_map_url' => Yii::t('app', 'End Place Map URL'),
            'price_eucents' => Yii::t('app', 'Price Eucents'),
            'vacants' => Yii::t('app', 'Vacants'),
            'capacity' => Yii::t('app', 'Capacity'),
        ];
    }

    public function getTitlesByLang() {
        return ArrayHelper::map($this->getTitles()->orderBy('language_code')->asArray()->all(), 'language_code', 'title');
    }
    public function getTitle() {
        if (!$this->title) {
            $titles = $this->getTitlesByLang();
            if (!$titles) $this->title = Yii::t('app', 'Not set');
            else if (!empty($titles[Yii::$app->language]))
                $this->title = $titles[Yii::$app->language];
            else if (!empty($titles[Yii::$app->sourceLanguage]))
                $this->title = $titles[Yii::$app->sourceLanguage];
            else foreach($titles as $title) if ($title) {
                $this->title = $title;
                break;
            }
        }
        return $this->title;
    }
    public function getSubtitlesByLang() {
        return ArrayHelper::map($this->getSubtitles()->orderBy('language_code')->asArray()->all(), 'language_code', 'subtitle');
    }
    public function getSubtitle() {
        if (!$this->subtitle) {
            $subtitles = $this->getSubtitlesByLang();
            if (!$subtitles) $this->subtitle = Yii::t('app', 'Not set');
            else if (!empty($subtitles[Yii::$app->language]))
                $this->subtitle = $subtitles[Yii::$app->language];
            else if (!empty($subtitles[Yii::$app->sourceLanguage]))
                $this->subtitle = $subtitles[Yii::$app->sourceLanguage];
            else foreach($subtitles as $subtitle) if ($subtitle) {
                $this->subtitle = $subtitle;
                break;
            }
        }
        return $this->subtitle;
    }
    public function getDescriptionsByLang() {
        return ArrayHelper::map($this->getDescriptions()->orderBy('language_code')->asArray()->all(), 'language_code', 'description');
    }
    public function getDescription() {
        if (!$this->description) {
            $descriptions = $this->getDescriptionsByLang();
            if (!$descriptions) $this->description = Yii::t('app', 'Not set');
            else if (!empty($descriptions[Yii::$app->language]))
                $this->description = $descriptions[Yii::$app->language];
            else if (!empty($descriptions[Yii::$app->sourceLanguage]))
                $this->description = $descriptions[Yii::$app->sourceLanguage];
            else foreach($descriptions as $description) if ($description) {
                $this->description = $description;
                break;
            }
        }
        return $this->description;
    }
    public function getItinerariesByLang() {
        return ArrayHelper::map($this->getItineraries()->orderBy('language_code')->asArray()->all(), 'language_code', 'itinerary');
    }
    public function getItinerary() {
        if (!$this->itinerary) {
            $itineraries = $this->getItinerariesByLang();
            if (!$itineraries) $this->itinerary = Yii::t('app', 'Not set');
            else if (!empty($itineraries[Yii::$app->language]))
                $this->itinerary = $itineraries[Yii::$app->language];
            else if (!empty($itineraries[Yii::$app->sourceLanguage]))
                $this->itinerary = $itineraries[Yii::$app->sourceLanguage];
            else foreach($itineraries as $itinerary) if ($itinerary) {
                $this->itinerary = $itinerary;
                break;
            }
        }
        return $this->itinerary;
    }
    public function getIncludesesByLang() {
        return ArrayHelper::map($this->getIncludeses()->orderBy('language_code')->asArray()->all(), 'language_code', 'includes');
    }
    public function getIncludes() {
        if (!$this->includes) {
            $includeses = $this->getIncludesesByLang();
            if (!$includeses) $this->includes = Yii::t('app', 'Not set');
            else if (!empty($includeses[Yii::$app->language]))
                $this->includes = $includeses[Yii::$app->language];
            else if (!empty($includeses[Yii::$app->sourceLanguage]))
                $this->includes = $includeses[Yii::$app->sourceLanguage];
            else foreach($includeses as $includes) if ($includes) {
                $this->includes = $includes;
                break;
            }
        }
        return $this->includes;
    }
    public function getNotesesByLang() {
        return ArrayHelper::map($this->getNoteses()->orderBy('language_code')->asArray()->all(), 'language_code', 'notes');
    }
    public function getNotes() {
        if (!$this->notes) {
            $noteses = $this->getNotesesByLang();
            if (!$noteses) $this->notes = Yii::t('app', 'Not set');
            else if (!empty($noteses[Yii::$app->language]))
                $this->notes = $noteses[Yii::$app->language];
            else if (!empty($noteses[Yii::$app->sourceLanguage]))
                $this->notes = $noteses[Yii::$app->sourceLanguage];
            else foreach($noteses as $notes) if ($notes) {
                $this->notes = $notes;
                break;
            }
        }
        return $this->notes;
    }
    public function afterFind() {
        parent::afterFind();
        $time = strtotime($this->start_ts);
        $formatter = Yii::$app->formatter;
        $this->start_weekday = $formatter->asDate($time, 'EEEE');
        $this->start_month = $formatter->asDate($time, 'MMMM');
        $this->start_day = date('d', $time);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(ActivityDescription::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncludeses()
    {
        return $this->hasMany(ActivityIncludes::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItineraries()
    {
        return $this->hasMany(ActivityItinerary::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoteses()
    {
        return $this->hasMany(ActivityNotes::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubtitles()
    {
        return $this->hasMany(ActivitySubtitle::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubtitleLanguageCodes()
    {
        return $this->hasMany(Language::className(), ['code' => 'language_code'])->viaTable('activity_subtitle', ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitles()
    {
        return $this->hasMany(ActivityTitle::className(), ['activity_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(ActivityFile::className(), ['activity_id' => 'id']);
    }
}

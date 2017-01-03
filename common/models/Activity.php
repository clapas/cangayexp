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
            'start_ts' => Yii::t('app', 'Start Ts'),
            'end_ts' => Yii::t('app', 'End Ts'),
            'start_place_name' => Yii::t('app', 'Start Place Name'),
            'start_place_map_url' => Yii::t('app', 'Start Place Map Url'),
            'end_place_name' => Yii::t('app', 'End Place Name'),
            'end_place_map_url' => Yii::t('app', 'End Place Map Url'),
            'price_eucents' => Yii::t('app', 'Price Eucents'),
            'vacants' => Yii::t('app', 'Vacants'),
            'capacity' => Yii::t('app', 'Capacity'),
        ];
    }

    public function getTitlesByLang() {
        return ArrayHelper::map($this->getTitles()->asArray()->all(), 'language_code', 'title');
    }
    public function getTitle() {
        if (!$this->title) {
            $titles = $this->getTitlesByLang();
            if ($titles and isset($titles[Yii::$app->language]))
                $this->title = $titles[Yii::$app->language];
            else if ($titles and isset($titles[Yii::$app->sourceLanguage]))
                $this->title = $titles[Yii::$app->sourceLanguage];
        }
        return $this->title;
    }
    public function getSubtitlesByLang() {
        return ArrayHelper::map($this->getSubtitles()->asArray()->all(), 'language_code', 'subtitle');
    }
    public function getSubtitle() {
        if (!$this->subtitle) {
            $subtitles = $this->getSubtitlesByLang();
            if ($subtitles and isset($subtitles[Yii::$app->language]))
                $this->subtitle = $subtitles[Yii::$app->language];
            else if ($subtitles and isset($subtitles[Yii::$app->sourceLanguage]))
                $this->subtitle = $subtitles[Yii::$app->sourceLanguage];
        }
        return $this->subtitle;
    }
    public function getDescriptionsByLang() {
        return ArrayHelper::map($this->getDescriptions()->asArray()->all(), 'language_code', 'description');
    }
    public function getDescription() {
        if (!$this->description) {
            $descriptions = $this->getDescriptionsByLang();
            if ($descriptions and isset($descriptions[Yii::$app->language]))
                $this->description = $descriptions[Yii::$app->language];
            else if ($descriptions and isset($descriptions[Yii::$app->sourceLanguage]))
                $this->description = $descriptions[Yii::$app->sourceLanguage];
        }
        return $this->description;
    }
    public function getItinerariesByLang() {
        return ArrayHelper::map($this->getItineraries()->asArray()->all(), 'language_code', 'itinerary');
    }
    public function getItinerary() {
        if (!$this->itinerary) {
            $itineraries = $this->getItinerariesByLang();
            if ($itineraries and isset($itineraries[Yii::$app->language]))
                $this->itinerary = $itineraries[Yii::$app->language];
            else if ($itineraries and isset($itineraries[Yii::$app->sourceLanguage]))
                $this->itinerary = $itineraries[Yii::$app->sourceLanguage];
        }
        return $this->itinerary;
    }
    public function getIncludesesByLang() {
        return ArrayHelper::map($this->getIncludeses()->asArray()->all(), 'language_code', 'includes');
    }
    public function getIncludes() {
        if (!$this->includes) {
            $includeses = $this->getIncludesesByLang();
            if ($includeses and isset($includeses[Yii::$app->language]))
                $this->includes = $includeses[Yii::$app->language];
            else if ($includeses and isset($includeses[Yii::$app->sourceLanguage]))
                $this->includes = $includeses[Yii::$app->sourceLanguage];
        }
        return $this->includes;
    }
    public function getNotesesByLang() {
        return ArrayHelper::map($this->getNoteses()->asArray()->all(), 'language_code', 'notes');
    }
    public function getNotes() {
        if (!$this->notes) {
            $noteses = $this->getNotesesByLang();
            if ($noteses and isset($noteses[Yii::$app->language]))
                $this->notes = $noteses[Yii::$app->language];
            else if ($noteses and isset($noteses[Yii::$app->sourceLanguage]))
                $this->notes = $noteses[Yii::$app->sourceLanguage];
        }
        return $this->notes;
    }
    public function afterFind() {
        parent::afterFind();
        $time = strtotime($this->start_ts);
        $this->start_weekday = date('l', $time);
        $this->start_month = date('F', $time);
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

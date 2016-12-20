<?php

namespace common\models;

use Yii;

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
    public $title;
    public $subtitle;
    public $description;
    public $includes;
    public $itinerary;
    public $notes;
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
    public function getIncludes()
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
    public function getNotes()
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

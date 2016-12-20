<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity_notes".
 *
 * @property integer $id
 * @property string $language_code
 * @property integer $activity_id
 * @property string $notes
 *
 * @property Activity $activity
 * @property Language $languageCode
 */
class ActivityNotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_code'], 'required'],
            [['activity_id'], 'integer'],
            [['language_code'], 'string', 'max' => 2],
            [['notes'], 'string', 'max' => 32],
            [['language_code', 'activity_id'], 'unique', 'targetAttribute' => ['language_code', 'activity_id'], 'message' => 'The combination of Language Code and Activity ID has already been taken.'],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activity_id' => 'id']],
            [['language_code'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language_code' => Yii::t('app', 'Language Code'),
            'activity_id' => Yii::t('app', 'Activity ID'),
            'notes' => Yii::t('app', 'Notes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageCode()
    {
        return $this->hasOne(Language::className(), ['code' => 'language_code']);
    }
}




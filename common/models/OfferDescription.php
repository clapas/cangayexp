<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offer_description".
 *
 * @property integer $id
 * @property string $language_code
 * @property string $md_content
 * @property integer $offer_id
 *
 * @property Language $languageCode
 * @property Offer $offer
 */
class OfferDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_code'], 'required'],
            [['md_content'], 'string'],
            [['offer_id'], 'integer'],
            [['language_code'], 'string', 'max' => 2],
            [['language_code', 'offer_id'], 'unique', 'targetAttribute' => ['language_code', 'offer_id'], 'message' => 'The combination of Language Code and Offer ID has already been taken.']
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
            'md_content' => Yii::t('app', 'Md Content'),
            'offer_id' => Yii::t('app', 'Offer ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageCode()
    {
        return $this->hasOne(Language::className(), ['code' => 'language_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(Offer::className(), ['id' => 'offer_id']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property integer $id
 * @property string $valid_from
 * @property string $valid_until
 * @property boolean $is_for_rent
 * @property boolean $is_featured
 * @property string $our_reference
 * @property string $their_reference
 *
 * @property OfferTitle[] $offerTitles
 * @property OfferDescription[] $offerDescriptions
 * @property PackageOffer[] $packageOffers
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valid_from', 'valid_until'], 'safe'],
            [['is_for_rent', 'is_featured'], 'boolean'],
            [['our_reference', 'their_reference'], 'string', 'max' => 24]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'valid_from' => Yii::t('app', 'Valid From'),
            'valid_until' => Yii::t('app', 'Valid Until'),
            'is_for_rent' => Yii::t('app', 'Is For Rent'),
            'is_featured' => Yii::t('app', 'Is Featured'),
            'our_reference' => Yii::t('app', 'Our Reference'),
            'their_reference' => Yii::t('app', 'Their Reference'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferTitles()
    {
        return $this->hasMany(OfferTitle::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferDescriptions()
    {
        return $this->hasMany(OfferDescription::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackageOffers()
    {
        return $this->hasMany(PackageOffer::className(), ['offer_id' => 'id']);
    }
}

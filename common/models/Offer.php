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
 * @property boolean $is_electricity_incl
 * @property boolean $is_water_incl
 * @property string $our_reference
 * @property string $their_reference
 * @property integer $rate_eucent
 * @property integer $commun_expenses_eucent
 * @property integer $floor_area_m2
 * @property string $zone_name
 *
 * @property PackageOffer[] $packageOffers
 * @property Zone $zoneName
 * @property OfferDescription[] $offerDescriptions
 * @property OfferTitle[] $offerTitles
 * @property OfferFile[] $offerFiles
 */
class Offer extends \yii\db\ActiveRecord
{
    public $rate_eu;
    public $floor_area_m2;
    public $commun_expenses_eu;
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
	    [['valid_from', 'valid_until'], 'date', 'format' => 'yyyy-M-d'],
	    [['valid_until'], 'compare', 'compareAttribute' => 'valid_from', 'operator' => '>=', 'skipOnEmpty' => true],
            [['is_for_rent', 'is_featured', 'is_electricity_incl', 'is_water_incl'], 'boolean'],
            [['rate_eu', 'commun_expenses_eu', 'floor_area_m2'], 'double'],
            [['our_reference', 'their_reference', 'zone_name'], 'string', 'max' => 24],
	    [['zone_name'], 'required']
        ];
    }

    public function afterFind() {
        $this->rate_eu = $this->rate_eucent / 100.;
        $this->floor_area_m2 = $this->floor_area_dm2 / 100.;
        $this->commun_expenses_eu= $this->commun_expenses_eucent / 100.;
    }
    public function afterValidate() {
        $this->rate_eucent = $this->rate_eu * 100;
        $this->floor_area_dm2 = $this->floor_area_m2 * 100;
        $this->commun_expenses_eucent = $this->commun_expenses_eu * 100;
	if (!$this->valid_from) unset($this->valid_from);
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
            'is_electricity_incl' => Yii::t('app', 'Is Electricity Included'),
            'is_water_incl' => Yii::t('app', 'Is Water Included'),
            'our_reference' => Yii::t('app', 'Our Reference'),
            'their_reference' => Yii::t('app', 'Their Reference'),
            'rate_eu' => Yii::t('app', 'Rate (€)'),
            'commun_expenses_eu' => Yii::t('app', 'Community Expenses (€)'),
            'floor_area_dm2' => Yii::t('app', 'Floor Area (m²)'),
            'zone_name' => Yii::t('app', 'Zone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackageOffers()
    {
        return $this->hasMany(PackageOffer::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZoneName()
    {
        return $this->hasOne(Zone::className(), ['name' => 'zone_name']);
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
    public function getOfferTitles()
    {
        return $this->hasMany(OfferTitle::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferFiles()
    {
        return $this->hasMany(OfferFile::className(), ['offer_id' => 'id']);
    }
}

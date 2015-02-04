<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property string $code
 * @property string $name
 *
 * @property OfferTitle[] $offerTitles
 * @property OfferDescription[] $offerDescriptions
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 24]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferTitles()
    {
        return $this->hasMany(OfferTitle::className(), ['language_code' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferDescriptions()
    {
        return $this->hasMany(OfferDescription::className(), ['language_code' => 'code']);
    }
}

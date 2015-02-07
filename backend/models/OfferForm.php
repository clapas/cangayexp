<?php
namespace backend\models;

use Yii;
use common\models\Offer;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Login form
 */
class OfferForm extends Offer
{
    public $files;
    public $titles;
    public $descriptions;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['files'], 'file', 'maxFiles' => 10],
            [['titles'], 'safe'],
            [['descriptions'], 'safe']
        ]);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'files' => Yii::t('app', 'Files'),
            'titles' => Yii::t('app', 'Titles'),
            'descriptions' => Yii::t('app', 'Descriptions'),
        ]);
    }
}

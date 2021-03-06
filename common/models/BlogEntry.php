<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_entry".
 *
 * @property integer $id
 * @property string $language_code
 * @property string $title
 * @property string $slug
 * @property string $post_date
 * @property string $author
 * @property string $lead_para
 * @property string $md_content
 *
 * @property Language $languageCode
 */
class BlogEntry extends \yii\db\ActiveRecord
{
    public $post_year;
    public $post_month;
    public $post_day;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_entry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_code', 'title', 'slug', 'post_date', 'author', 'md_content'], 'required'],
            [['post_date'], 'safe'],
            [['md_content'], 'string'],
            [['language_code'], 'string', 'max' => 2],
            [['title', 'slug'], 'string', 'max' => 48],
            [['author'], 'string', 'max' => 32],
            [['lead_para'], 'string', 'max' => 255],
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
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'post_date' => Yii::t('app', 'Post Date'),
            'author' => Yii::t('app', 'Author'),
            'lead_para' => Yii::t('app', 'Lead Paragraph'),
            'md_content' => Yii::t('app', 'Md Content'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['code' => 'language_code']);
    }
    public function afterFind() {
        parent::afterFind();
        $time = strtotime($this->post_date);
        $this->post_year = date('Y', $time);
        $this->post_month = date('m', $time);
        $this->post_day = date('d', $time);
    }
}

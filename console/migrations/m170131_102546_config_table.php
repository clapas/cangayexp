<?php

use yii\db\Schema;
use yii\db\Migration;

class m170131_102546_config_table extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp() {
        $this->createTable('{{%config}}', [
            'name' => Schema::TYPE_STRING . '(32) primary key',
            'value' => Schema::TYPE_STRING . '(256)',
        ]);
        $this->insert('{{%config}}', [
            'name' => 'catalog_url',
            'value' => 'https://drive.google.com/file/d/0B6m4bpAU2AOgT3JucDVSV19CMVE/view?usp=sharing'
        ]);
        $this->dropForeignKey('activity_description_language_code_fkey', 'activity_description');
        $this->addForeignKey('activity_description_language_code_fkey', 'activity_description', 'language_code', 'language', 'code', 'CASCADE');
        $this->dropForeignKey('activity_includes_language_code_fkey', 'activity_includes');
        $this->addForeignKey('activity_includes_language_code_fkey', 'activity_includes', 'language_code', 'language', 'code', 'CASCADE');
        $this->dropForeignKey('activity_itinerary_language_code_fkey', 'activity_itinerary');
        $this->addForeignKey('activity_itinerary_language_code_fkey', 'activity_itinerary', 'language_code', 'language', 'code', 'CASCADE');
        $this->dropForeignKey('activity_notes_language_code_fkey', 'activity_notes');
        $this->addForeignKey('activity_notes_language_code_fkey', 'activity_notes', 'language_code', 'language', 'code', 'CASCADE');
        $this->dropForeignKey('activity_subtitle_language_code_fkey', 'activity_subtitle');
        $this->addForeignKey('activity_subtitle_language_code_fkey', 'activity_subtitle', 'language_code', 'language', 'code', 'CASCADE');
        $this->dropForeignKey('activity_title_language_code_fkey', 'activity_title');
        $this->addForeignKey('activity_title_language_code_fkey', 'activity_title', 'language_code', 'language', 'code', 'CASCADE');
    }

    public function safeDown() {
        $this->dropTable('{{%config}}');
    }
}

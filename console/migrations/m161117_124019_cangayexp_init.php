<?php

use yii\db\Schema;
use yii\db\Migration;

class m161117_124019_cangayexp_init extends Migration {
    public function safeUp() {
        $this->createTable('{{%language}}', [
            'code' => Schema::TYPE_STRING . '(2) primary key',
            'name' => Schema::TYPE_STRING . '(24) not null'
        ]);
        $this->batchInsert('{{%language}}', [ 'code', 'name' ], [
	    ['es', 'Español' ],
	    ['en', 'English' ],
	    ['de', 'Deutsch' ],
	    ['no', 'Norsk' ],
	    ['ru', 'Pу́сский']
	]);
        $this->createTable('{{%activity}}', [
            'id' => Schema::TYPE_PK,
            'start_ts' => Schema::TYPE_DATETIME . ' not null',
            'end_ts' => Schema::TYPE_DATETIME . ' not null',
            'start_place_name' => Schema::TYPE_STRING . '(64) not null',
            'start_place_map_url' => Schema::TYPE_STRING . '(128)',
            'end_place_name' => Schema::TYPE_STRING . '(64) not null',
            'end_place_map_url' => Schema::TYPE_STRING . '(128)',
            'price_eucents' => Schema::TYPE_INTEGER . ' not null',
            'vacants' => Schema::TYPE_INTEGER,
            'capacity' => Schema::TYPE_INTEGER,
        ]);
        $this->createTable('{{%activity_title}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade',
            'title' => Schema::TYPE_STRING . '(32)',
            'unique (language_code, activity_id)'
        ]);
        $this->createTable('{{%activity_subtitle}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade',
            'subtitle' => Schema::TYPE_STRING . '(64)',
            'unique (language_code, activity_id)'
        ]);
        $this->createTable('{{%activity_itinerary}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade',
            'itinerary' => Schema::TYPE_STRING . '(512)',
            'unique (language_code, activity_id)'
        ]);
        $this->createTable('{{%activity_description}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade',
            'description' => Schema::TYPE_STRING . '(256)',
            'unique (language_code, activity_id)'
        ]);
        $this->createTable('{{%activity_includes}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade',
            'includes' => Schema::TYPE_STRING . '(128)',
            'unique (language_code, activity_id)'
        ]);
        $this->createTable('{{%activity_notes}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade',
            'notes' => Schema::TYPE_STRING . '(256)',
        ]);
        $this->createTable('{{%activity_file}}', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . '(255)',
            'activity_id' => Schema::TYPE_INTEGER . ' references activity(id) on delete cascade'
        ]);
        $this->createTable('{{%blog_entry}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'title' => Schema::TYPE_STRING . '(48) not null',
            'slug' => Schema::TYPE_STRING . '(48) not null',
            'post_date' => Schema::TYPE_DATE . ' not null',
            'author' => Schema::TYPE_STRING . '(32) not null',
            'lead_para' => Schema::TYPE_STRING . '(255)',
            'md_content' => Schema::TYPE_TEXT . ' not null',
            'unique (title)',
            'unique (slug)'
        ]);
    }

    public function safeDown() {
        $this->dropTable('{{%blog_entry}}');
        $this->dropTable('{{%activity_file}}');
        $this->dropTable('{{%activity_notes}}');
        $this->dropTable('{{%activity_includes}}');
        $this->dropTable('{{%activity_description}}');
        $this->dropTable('{{%activity_itinerary}}');
        $this->dropTable('{{%activity_subtitle}}');
        $this->dropTable('{{%activity_title}}');
        $this->dropTable('{{%activity}}');
        $this->dropTable('{{%language}}');
    }
}

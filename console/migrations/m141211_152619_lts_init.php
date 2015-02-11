<?php

use yii\db\Schema;
use yii\db\Migration;

class m141211_152619_lts_init extends Migration {
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
        $this->createTable('{{%location}}', [
            'id' => Schema::TYPE_PK,
            'alias' => Schema::TYPE_STRING . '(32) not null',
            'street_name' => Schema::TYPE_STRING . '(255)',
            'street_number' => Schema::TYPE_STRING . '(16)',
            'unformatted_address_line' => Schema::TYPE_STRING . '(255)',
            'city_name' => Schema::TYPE_STRING . '(255)',
            'postal_code' => Schema::TYPE_STRING . '(16)',
            'county' => Schema::TYPE_STRING . '(255)',
            'stateprov' => Schema::TYPE_STRING . '(255)',
            'country' => Schema::TYPE_STRING . '(255)',
            'directions' => Schema::TYPE_TEXT
        ]);
        $this->execute('create type "ItemType" as enum (\'PROPERTY\', \'SERVICE\')');
        $this->createTable('{{%item}}', [
            'id' => Schema::TYPE_PK,
            'internal_locator' => Schema::TYPE_STRING . '(24)',
            'item_type' => '"ItemType" not null',
            'location_id' => Schema::TYPE_INTEGER . ' references location(id)',
            'check (item_type != \'PROPERTY\' or location_id is not null)'
        ]);
        $this->createTable('{{%offer}}', [
            'id' => Schema::TYPE_PK,
            //'item_id' => Schema::TYPE_INTEGER . ' not null references item(id)',
            'valid_from' => Schema::TYPE_DATE . ' not null default current_date',
            'valid_until' => Schema::TYPE_DATE,
            'is_for_rent' => Schema::TYPE_BOOLEAN . ' not null default false',
            'is_featured' => Schema::TYPE_BOOLEAN . ' not null default false',
            'our_reference' => Schema::TYPE_STRING . '(24)',
            'their_reference' => Schema::TYPE_STRING . '(24)',
            //'min_rent_period_days' => Schema::TYPE_SMALLINT,
            //'max_rent_period_days' => Schema::TYPE_SMALLINT,
            //'unit_rate_eucents' => Schema::TYPE_INTEGER,
            //'n_available' => Schema::TYPE_SMALLINT,
            //'from_n_units' => Schema::TYPE_SMALLINT,
            //'to_n_units' => Schema::TYPE_SMALLINT,
            'check (valid_until is null or valid_until >= valid_from)'
        ]);
        $this->createTable('{{%offer_file}}', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . '(256)',
            'offer_id' => Schema::TYPE_INTEGER . ' references offer(id) on delete cascade'
        ]);
        $this->createTable('{{%offer_title}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'title' => Schema::TYPE_STRING . '(32)',
            'offer_id' => Schema::TYPE_INTEGER . ' references offer(id) on delete cascade',
            'unique (language_code, offer_id)'
        ]);
        $this->createTable('{{%offer_description}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'md_content' => Schema::TYPE_TEXT,
            'offer_id' => Schema::TYPE_INTEGER . ' references offer(id) on delete cascade',
            'unique (language_code, offer_id)'
        ]);
        $this->createTable('{{%package}}', [
            'id' => Schema::TYPE_PK,
            'valid_from' => Schema::TYPE_DATE . ' not null default current_date',
            'valid_until' => Schema::TYPE_DATE,
            'total_eucents' => Schema::TYPE_INTEGER
        ]);
        $this->createTable('{{%package_offer}}', [
            'id' => Schema::TYPE_PK,
            'offer_id' => Schema::TYPE_INTEGER . ' not null references offer(id) on delete cascade',
            'package_id' => Schema::TYPE_INTEGER . ' not null references package(id) on delete cascade',
            'n_units' => Schema::TYPE_SMALLINT
        ]);
    }

    public function safeDown() {
        $this->dropTable('{{%package_offer}}');
        $this->dropTable('{{%package}}');
        $this->dropTable('{{%offer_description}}');
        $this->dropTable('{{%offer_title}}');
        $this->dropTable('{{%offer_file}}');
        $this->dropTable('{{%offer}}');
        $this->dropTable('{{%item}}');
        $this->execute('drop type "ItemType"');
        $this->dropTable('{{%location}}');
        $this->dropTable('{{%language}}');
    }
}

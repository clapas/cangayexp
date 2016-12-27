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
        $this->createTable('{{%zone}}', [
            'name' => Schema::TYPE_STRING . '(24) primary key'
	]);
        $this->batchInsert('{{%zone}}', ['name' ], [
	    ['Meloneras'],
	    ['Playa del Inglés'],
	    ['Maspalomas'],
	    ['San Agustín'],
	    ['Puerto Rico']
	]);
        $this->createTable('{{%location}}', [
            'id' => Schema::TYPE_PK,
            'alias' => Schema::TYPE_STRING . '(32) not null',
	    'zone_name' => Schema::TYPE_STRING . '(24) not null references zone(name)',
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
            'is_electricity_incl' => Schema::TYPE_BOOLEAN . ' not null default false',
            'is_water_incl' => Schema::TYPE_BOOLEAN . ' not null default false',
            'our_reference' => Schema::TYPE_STRING . '(24)',
            'their_reference' => Schema::TYPE_STRING . '(24)',
	    'rate_eucent' => Schema::TYPE_INTEGER,
	    'commun_expenses_eucent' => Schema::TYPE_INTEGER,
	    'floor_area_dm2' => Schema::TYPE_INTEGER,
            //'min_rent_period_days' => Schema::TYPE_SMALLINT,
            //'max_rent_period_days' => Schema::TYPE_SMALLINT,
            //'unit_rate_eucents' => Schema::TYPE_INTEGER,
            //'n_available' => Schema::TYPE_SMALLINT,
            //'from_n_units' => Schema::TYPE_SMALLINT,
            //'to_n_units' => Schema::TYPE_SMALLINT,
	    'zone_name' => Schema::TYPE_STRING . '(24) references zone(name)',
            'check (valid_until is null or valid_until >= valid_from)'
        ]);
        //$this->createTable('{{%offer_commun_area}}'...
        //$this->createTable('{{%offer_surroundings}}'...
        $this->createTable('{{%offer_file}}', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . '(255)',
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
        $this->createTable('{{%activity}}', [
            'id' => Schema::TYPE_PK,
            'start_ts' => Schema::TYPE_DATETIME,
            'end_ts' => Schema::TYPE_DATETIME,
            'start_place_name' => Schema::TYPE_STRING . '(64)',
            'start_place_map_url' => Schema::TYPE_STRING . '(128)',
            'end_place_name' => Schema::TYPE_STRING . '(64)',
            'end_place_map_url' => Schema::TYPE_STRING . '(128)',
            'price_eucents' => Schema::TYPE_INTEGER,
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
            'post_date' => Schem::TYPE_DATE . ' not null',
            'author' => Schema::TYPE_STRING . '(16) not null',
            'lead_para' => Schema::TYPE_STRING . '(255)',
            'md_content' => Schema::TYPE_TEXT . ' not null',
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
        $this->dropTable('{{%package_offer}}');
        $this->dropTable('{{%package}}');
        $this->dropTable('{{%offer_description}}');
        $this->dropTable('{{%offer_title}}');
        $this->dropTable('{{%offer_file}}');
        $this->dropTable('{{%offer}}');
        $this->dropTable('{{%item}}');
        $this->execute('drop type "ItemType"');
        $this->dropTable('{{%location}}');
        $this->dropTable('{{%zone}}');
        $this->dropTable('{{%language}}');
    }
}

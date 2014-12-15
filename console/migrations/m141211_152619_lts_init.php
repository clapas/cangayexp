<?php

use yii\db\Schema;
use yii\db\Migration;

class m141211_152619_lts_init extends Migration {
    public function safeUp() {
        $this->createTable('{{%language}}', [
            'code' => Schema::TYPE_STRING . '(2) primary key',
            'name' => Schema::TYPE_STRING . '(24) not null'
        ]);
        $this->createTable('{{%location}}', [
            'id' => Schema::TYPE_PK,
            'street_name' => Schema::TYPE_STRING . '(255)',
            'street_number' => Schema::TYPE_STRING . '(16)',
            'building_name' => Schema::TYPE_STRING . '(255)',
            'building_door' => Schema::TYPE_STRING . '(16)',
            'unformatted_address_line' => Schema::TYPE_STRING . '(255)',
            'city_name' => Schema::TYPE_STRING . '(255)',
            'postal_code' => Schema::TYPE_STRING . '(16)',
            'county' => Schema::TYPE_STRING . '(255)',
            'stateprov' => Schema::TYPE_STRING . '(255)',
            'country' => Schema::TYPE_STRING . '(255)',
            'directions' => Schema::TYPE_TEXT
        ]);
        $this->execute('create type "ItemType" as enum (\'PROPERTY\', \'SERVICE\');');
        $this->createTable('{{%item}}', [
            'id' => Schema::TYPE_PK,
            'item_type' => '"ItemType" not null',
            'is_on_sale' => Schema::TYPE_BOOLEAN . ' not null default true',
            'min_rent_period_days' => Schema::TYPE_SMALLINT, 
            'max_rent_period_days' => Schema::TYPE_SMALLINT, 
            'our_reference' => Schema::TYPE_STRING . '(24)',
            'their_reference' => Schema::TYPE_STRING . '(24)',
            'location_id' => Schema::TYPE_INTEGER . ' references location(id)',
            'check (item_type != \'PROPERTY\' or location_id is not null)'
        ]);
        $this->createTable('{{%item_description}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'md_content' => Schema::TYPE_TEXT,
            'item_id' => Schema::TYPE_INTEGER . ' references item(id)',
            'unique (language_code, item_id)'
        ]);
        $this->createTable('{{%item_title}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'md_content' => Schema::TYPE_TEXT,
            'item_id' => Schema::TYPE_INTEGER . ' references item(id)',
            'unique (language_code, item_id)'
        ]);
        $this->createTable('{{%offer}}', [
            'id' => Schema::TYPE_PK,
            'item_id' => Schema::TYPE_INTEGER . ' not null references item(id)',
            'valid_from' => Schema::TYPE_DATE . ' not null default current_date',
            'valid_until' => Schema::TYPE_DATE,
            'n_available' => Schema::TYPE_SMALLINT,
            'is_featured' => Schema::TYPE_BOOLEAN . ' not null default false',
            'from_n_units' => Schema::TYPE_SMALLINT,
            'to_n_units' => Schema::TYPE_SMALLINT,
            'units_rate_eucents' => Schema::TYPE_INTEGER,
            'reference' => Schema::TYPE_STRING . '(24)',
            'check (valid_until is null or valid_until >= valid_from)'
        ]);
        $this->createTable('{{%offer_condition}}', [
            'id' => Schema::TYPE_PK,
            'language_code' => Schema::TYPE_STRING . '(2) not null references language(code)',
            'md_content' => Schema::TYPE_TEXT,
            'offer_id' => Schema::TYPE_INTEGER . ' references offer(id)',
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
            'offer_id' => Schema::TYPE_INTEGER . ' not null references offer(id)',
            'package_id' => Schema::TYPE_INTEGER . ' not null references package(id)',
            'n_units' => Schema::TYPE_SMALLINT
        ]);
    }

    public function safeDown() {
        $this->dropTable('{{%language}}');
        $this->dropTable('{{%location}}');
        $this->dropTable('{{%item}}');
        $this->dropTable('{{%item_description}}');
        $this->dropTable('{{%item_title}}');
        $this->dropTable('{{%offer}}');
        $this->dropTable('{{%offer_condition}}');
        $this->dropTable('{{%package}}');
        $this->dropTable('{{%package_offer}}');
    }
}

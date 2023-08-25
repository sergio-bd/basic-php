<?php

use yii\db\Migration;

/**
 * Class m230824_010101_create_country_ext_europe
 */
class m230824_010101_create_country_ext_europe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%country_ext_europe}}', [
            'country_id' => $this->primaryKey(),
            'is_european' => $this->boolean(),
            'is_schengen' => $this->boolean()
        ], $tableOptions);
        $this->addForeignKey('fk-country_ext_europe-country', '{{%country_ext_europe}}', 'country_id', 'country', 'id', 'cascade', 'cascade');
        $this->batchInsert(
            '{{%country_ext_europe}}',
            ['country_id', 'is_european', 'is_schengen'],
            [
                [5,  true, true],
                [6,  true, true],
                [9,  true, true],
                [10, true, false],
            ]
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-country_ext_europe-country', '{{%country_ext_europe}}');
        $this->dropTable('{{%country_ext_europe}}');
        return true;
    }
}

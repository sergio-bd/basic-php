<?php

use yii\db\Migration;

/**
 * Class m230822_220101_create_countries
 */
class m230822_220101_create_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer(),
            'code' => $this->char(2)->unique(),
            'name' => $this->string(125),
        ], $tableOptions);
        $this->addForeignKey('fk-country-language', '{{%country}}', 'lang_id', 'language', 'id', 'cascade', 'cascade');
        $this->batchInsert(
            '{{%country}}',
            ['id', 'lang_id', 'code', 'name'],
            [
                [1,  1, 'AU', 'Australia'],
                [2,  2, 'BR', 'Brazil'],
                [3,  1, 'CA', 'Canada'],
                [4,  7, 'CN', 'China'],
                [5,  2, 'DE', 'Germany'],
                [6,  4, 'FR', 'France'],
                [7,  1, 'GB', 'United Kingdom'],
                [8,  6, 'IN', 'India'],
                [9,  5, 'IT', 'Italy'],
                [10, 8, 'RU', 'Russia'],
                [11, 1, 'US', 'United States']
            ]
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-country-language', '{{%country}}');
        $this->dropTable('{{%country}}');
        return true;
    }
}

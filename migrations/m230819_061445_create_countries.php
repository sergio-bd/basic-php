<?php

use yii\db\Migration;

/**
 * Class m230819_061445_create_countries
 */
class m230819_061445_create_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'code' => $this->char(2)->unique(),
            'name' => $this->string(125)
        ], $tableOptions);
        $this->batchInsert(
            '{{%country}}',
            ['id', 'code', 'name'],
            [
                [1,  'AU', 'Australia'],
                [2,  'BR', 'Brazil'],
                [3,  'CA', 'Canada'],
                [4,  'CN', 'China'],
                [5,  'DE', 'Germany'],
                [6,  'FR', 'France'],
                [7,  'GB', 'United'],
                [8,  'IN', 'India'],
                [9,  'RU', 'Russia'],
                [10, 'US', 'United']
            ]
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
        return true;
    }
}

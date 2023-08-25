<?php

use yii\db\Migration;

/**
 * Class m230822_080123_create_languages
 */
class m230822_080123_create_languages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ], $tableOptions);
        $this->batchInsert(
            '{{%language}}',
            ['id', 'name'],
            [
                [1,  'English'],
                [2,  'German'],
                [3,  'Spanish'],
                [4,  'French'],
                [5,  'Italian'],
                [6,  'Hindi'],
                [7,  'Chinese'],
                [8,  'Russian']
            ]
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
        return true;
    }

}

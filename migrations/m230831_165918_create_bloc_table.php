<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bloc}}`.
 */
class m230831_165918_create_bloc_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bloc}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
        $this->batchInsert(
            '{{%bloc}}',
            ['id', 'name'],
            [
                [1,  'AUKUS'],
                [2,  'BRICS'],
                [3,  'EU'],
                [4,  'NATO']
            ]
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bloc}}');
        return true;
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country_union}}`.
 */
class m230831_170712_create_country_bloc_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country_bloc}}', [
            'country_id' => $this->integer(),
            'bloc_id' => $this->integer()
        ]);
        $this->addPrimaryKey('pk-country-bloc', '{{%country_bloc}}', ['country_id', 'bloc_id']);
        $this->addForeignKey('fk-country_bloc-country','{{%country_bloc}}','country_id','country','id','cascade','cascade');
        $this->addForeignKey('fk-country_bloc-bloc','{{%country_bloc}}','bloc_id','bloc','id','cascade','cascade');
        $this->batchInsert(
            '{{%country_bloc}}',
            ['country_id', 'bloc_id'],
            [
                [1,  1],
                [2,  2],
                [3,  1],
                [3,  4],
                [4,  2],
                [5,  3],
                [5,  4],
                [6,  3],
                [6,  4]
            ]
        );
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-country_bloc-bloc', '{{%country_bloc}}');
        $this->dropForeignKey('fk-country_bloc-country', '{{%country_bloc}}');
        $this->dropTable('{{%country_bloc}}');
        return true;
    }
}

<?php

use yii\db\Migration;

/**
 * Class m191216_185012_createTable_color_issue_1
 */
class m191216_185012_createTable_color_issue_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tablePrefix = $this->db->tablePrefix;
        $this->createTable(
            '{{%color}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull()->comment('Title'),
                'alias' => $this->string()->notNull()->comment('Alias'),
                'created_at' => $this->integer()->notNull()->comment('Created at'),
                'updated_at' => $this->integer()->defaultValue(0)->null()->comment('Updated at'),
                'created_by' => $this->integer()->notNull()->comment('Created By'),
                'updated_by' => $this->integer()->null()->defaultValue(0)->comment('Created By'),
            ]
        );
        $this->addForeignKey('x_fk_color', $tablePrefix . 'apple', 'color_id', $tablePrefix . 'color', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
        $this->dropTable('{{%color}}');
        $this->db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
    }
}

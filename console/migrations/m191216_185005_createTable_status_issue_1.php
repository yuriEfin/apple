<?php

use yii\db\Migration;

/**
 * Class m191216_185005_createTable_status_issue_1
 */
class m191216_185005_createTable_status_issue_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tablePrefix = $this->db->tablePrefix;
        $this->createTable(
            '{{%status}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(100)->comment('Name'),
                'alias' => $this->string(100)->comment('Alias'),
                'is_default' => $this->string(100)->comment('Is Default'),
                'created_at' => $this->integer()->notNull()->comment('Created at'),
                'updated_at' => $this->integer()->defaultValue(0)->null()->comment('Updated at'),
                'created_by' => $this->integer()->defaultValue(0)->null()->comment('Created By'),
                'updated_by' => $this->integer()->defaultValue(0)->null()->comment('Created By'),
            ]
        );
        $this->addForeignKey('x_fk_status', $tablePrefix . 'apple', 'status_id', $tablePrefix . 'status', 'id');
        $this->createIndex('x_alias', '{{%status}}', 'alias', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
        $this->dropTable('{{%status}}');
        $this->db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
    }
}

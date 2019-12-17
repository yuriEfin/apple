<?php

use yii\db\Migration;

/**
 * Class m191216_184854_createTable_apple_issue_1
 */
class m191216_184854_createTable_apple_issue_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%apple}}',
            [
                'id' => $this->primaryKey(),
                'status_id' => $this->integer()->notNull()->defaultValue(0)->comment('Status'),
                'color_id' => $this->integer()->notNull()->defaultValue(0)->comment('Color'),
                'date_fell' => $this->integer()->comment('Date fell'),
                'size' => $this->integer()->comment('Size'),
                'bite_off_size' => $this->integer()->comment('Bite Off Size'),
                'deleted' => $this->boolean()->comment('Deleted'),
                'created_at' => $this->integer()->notNull()->comment('Created at'),
                'updated_at' => $this->integer()->defaultValue(0)->null()->comment('Updated at'),
                'created_by' => $this->integer()->defaultValue(0)->null()->comment('Created By'),
                'updated_by' => $this->integer()->defaultValue(0)->null()->comment('Created By'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apple}}');
    }
}

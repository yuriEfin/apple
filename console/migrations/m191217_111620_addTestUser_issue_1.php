<?php

use yii\db\Migration;

/**
 * Class m191217_111620_addTestUser_issue_1
 */
class m191217_111620_addTestUser_issue_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(
            '{{%user}}',
            [
                'username' => 'efinYuri',
                'auth_key' => 'Kl1clUL0a8W7r-TNkyVfp3KCI-lIy60I',
                'password_hash' => '$2y$13$zRXYHBKUceuOtyriB5zaAeDFPlfdDcGc4fKdRBY4xBfTl556fuvI2',
                'email' => 'php.gambit@gmail.com',
                'status' => 10,
                'created_at' => time(),
                'updated_at' => time(),
                'verification_token' => 'EgPb4M93-afdzLRQtfZ2aS1wMbAjQITL_1576283534',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191214_015035_addTestUser cannot be reverted.\n";

        return false;
    }
}

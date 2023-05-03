<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230503_135952_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55),
            'password' => $this->string(12),
            'auth_key' => $this->string(255),
            'access_token' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

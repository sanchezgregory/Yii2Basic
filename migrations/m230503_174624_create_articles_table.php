<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m230503_174624_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1024)->notNull(),
            'slug' => $this->string(1024)->notNull(),
            'body' => 'LONGTEXT',
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->addForeignKey('fk_article_user_created_by', '{{%articles}}', 'created_by', '{{%users}}', 'id');
        $this->addForeignKey('fk_article_user_updated_by', '{{%articles}}', 'updated_by', '{{%users}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_article_user_created_by', '{{%articles}}');
        $this->dropForeignKey('fk_article_user_updated_by', '{{%articles}}');
        $this->dropTable('{{%articles}}');
    }
}

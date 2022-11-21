<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221121_153718_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->unique(),
            'fullname' => $this->string(50),
            'password' => $this->string(50),
            'email' => $this->string(50),
            'auth_key' => $this->string(100)->unique(),
            'created_at' => $this->dateTime(),
        ], );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

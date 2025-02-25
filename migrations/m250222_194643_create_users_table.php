<?php

//to create this, in cmd:
//php yii migrate/create create_users_table
//php yii migrate

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m250222_194643_create_users_table extends Migration
{
    /**
     * Run the migration (creating the `users` table).
     * This method is executed when applying the migration.
     */
    public function safeUp()
    {
        $this->createTable('users', [
            // Primary key (auto-incrementing ID)
            'id' => $this->primaryKey(),
            // First name, required, max length of 128 characters
            'first_name' => $this->string(128)->notNull(),
            // Last name, optional (NULL allowed), max length of 128 characters
            'last_name' => $this->string(128),
            // Email, required, must be unique, max length of 255 characters
            'email' => $this->string(255)->notNull()->unique(),
            // Date of birth, required, stored in DATE format (YYYY-MM-DD)
            'date_of_birth' => $this->date()->notNull(),
            // Timestamp of creation, defaults to current time when a row is inserted
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * Revert the migration (dropping the `users` table).
     * This method is executed when rolling back the migration.
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

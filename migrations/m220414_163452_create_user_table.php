<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220414_163452_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->comment('Порядковый номер'),
            'firstname' => $this->string()->comment('Имя'),
            'lastname' => $this->string()->comment("Фамилия"),
            'birthday' => $this->integer()->comment('Дата рождения'),
            'education' => $this->smallInteger()->comment('Образование'),
            'phone' => $this->string()->comment('Номер телефона'),
            'created_at' => $this->integer()->comment('Зарегистрирован'),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}

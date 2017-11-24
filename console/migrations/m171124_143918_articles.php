<?php

use yii\db\Migration;

/**
 * Class m171124_143918_articles
 */
class m171124_143918_articles extends Migration
{
// Создание миграции -- yii migrate/create articles
// Применение миграции -- yii migrate

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'text' => $this->string(),
            'author_id' => $this->integer(),
            'alias' => $this->string(200),
            'data' => $this->date("Y-m-d"),
            'likes' => $this->integer(),
            'hits' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%articles}}');
    }

    /**
     * @inheritdoc
     */
    /*public function safeUp()
    {

    }*/

    /**
     * @inheritdoc
     */
    /* public function safeDown()
     {
         echo "m171124_143918_articles cannot be reverted.\n";

         return false;
     }*/


}

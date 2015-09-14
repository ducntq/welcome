<?php

use yii\db\Migration;

class m150913_184030_create_message_table extends Migration
{
    public function up()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey(),
            'content' => $this->text()
        ]);


    }

    public function down()
    {
        $this->dropTable('message');
        return false;
    }
}

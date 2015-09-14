<?php

use app\models\User;
use yii\db\Migration;

class m150913_184019_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string(),
            'auth_key' => $this->string(),
            'access_token' => $this->string(),
            'user_type' => $this->integer()->notNull()->defaultValue(1),
            'status' => $this->integer()->notNull()->defaultValue(10),
            'message_id' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // seed users
        $adminUser = new User();
        $adminUser->username = 'admin';
        $adminUser->setPassword('123456');
        $adminUser->user_type = User::TYPE_ADMIN;
        $adminUser->status = User::STATUS_ACTIVE;
        $adminUser->save();

        $normalUser = new User();
        $normalUser->username = 'user1';
        $normalUser->setPassword('123456');
        $normalUser->user_type = User::TYPE_USER;
        $normalUser->status = User::STATUS_ACTIVE;
        $normalUser->save();

        $normalUser = new User();
        $normalUser->username = 'user2';
        $normalUser->setPassword('123456');
        $normalUser->user_type = User::TYPE_USER;
        $normalUser->status = User::STATUS_ACTIVE;
        $normalUser->save();

        $normalUser = new User();
        $normalUser->username = 'user3';
        $normalUser->setPassword('123456');
        $normalUser->user_type = User::TYPE_USER;
        $normalUser->status = User::STATUS_ACTIVE;
        $normalUser->save();

        $normalUser = new User();
        $normalUser->username = 'user4';
        $normalUser->setPassword('123456');
        $normalUser->user_type = User::TYPE_USER;
        $normalUser->status = User::STATUS_ACTIVE;
        $normalUser->save();

        return true;
    }

    public function down()
    {
        $this->dropTable('user');
        return true;
    }

}

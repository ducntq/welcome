<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;


class UserForm extends Model
{
    public $id;
    public $username;
    public $message_id;
    /** @var bool */
    public $active = true;

    /** @var User */
    private $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['message_id'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'message_id' => 'Welcome message'
        ];
    }

    public function save()
    {
        if (!isset($this->user)) $this->user = new User();
        //$this->user->username = $this->username;
        $this->user->message_id = $this->message_id;
        return $this->user->save();
    }

    public function loadFromUserId($id)
    {
        $this->user = User::find()->where(['id' => $id])->one();
        if ($this->user) {
            $this->id = $this->user->id;
            $this->username = $this->user->username;
            $this->message_id = $this->user->message_id;
        }
        return $this->user;
    }
}
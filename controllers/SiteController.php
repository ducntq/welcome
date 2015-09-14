<?php

namespace app\controllers;

use app\models\Message;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        /** @var \app\models\User $user */
        $user = Yii::$app->user->identity;
        $messageContent = 'Default welcome message hard coded';

        if ($user->message_id > 0) {
            /** @var \app\models\Message $message */
            $message = Message::find()->where(['id' => $user->message_id])->one();
            if ($message && !empty($message->content)) $messageContent = $message->content;
        }

        return $this->render('index', ['message' => $messageContent]);
    }
}

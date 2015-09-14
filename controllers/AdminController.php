<?php
/**
 * Created by PhpStorm.
 * User: ducntq
 * Date: 14/09/2015
 * Time: 02:20
 */

namespace app\controllers;


use app\models\forms\UserForm;
use app\models\Message;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Html;

class AdminController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()->all();

        return $this->render('index', ['users' => $users]);
    }

    public function actionEditUser($id)
    {
        $model = new UserForm();
        if ($model->loadFromUserId($id)) {
            if (\Yii::$app->request->isPost) {
                $model->load($_POST);
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', 'User updated successfully: ' . $model->username);
                } else {
                    \Yii::$app->session->setFlash('error', 'Failed to update user');
                }
            }

            $messages = Message::find()->all();

            $messages = ArrayHelper::map($messages, 'id', 'content');

            return $this->render('form', ['model' => $model, 'messages' => $messages]);
        } else {
            throw new HttpException(404, 'No user found');
        }
    }

    public function actionDeleteUser($id)
    {
        /** @var User $user */
        $user = User::find()->where(['id' => $id])->one();
        if ($user) {
            if ($user->delete()) {
                \Yii::$app->session->setFlash('error', 'User was deleted: ' . Html::encode($user->username));
            } else {
                \Yii::$app->session->setFlash('error', 'Failed to delete user ' . Html::encode($user->username));
            }

            $this->redirect(\Yii::$app->request->referrer);
        } else {
            throw new HttpException(404, 'No user found');
        }
    }

    public function actionMessages()
    {
        $messages = Message::find()->all();

        return $this->render('messages', ['messages' => $messages]);
    }

    public function actionCreateMessage()
    {
        $model = new Message();

        if (\Yii::$app->request->isPost) {
            $model->load($_POST);
            if ($model->save()) {
                $model = new Message();
                \Yii::$app->session->setFlash('success', 'Message was created successfully');
            } else {
                \Yii::$app->session->setFlash('error', 'Failed to create message');
            }
        }

        return $this->render('message-form', ['title' => 'Create message', 'model' => $model]);
    }

    public function actionEditMessage($id)
    {
        $model = Message::find()->where(['id' => $id])->one();

        if (!$model) throw new HttpException(404, 'No message is found');

        if (\Yii::$app->request->isPost) {
            $model->load($_POST);
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Message was updated successfully');
            } else {
                \Yii::$app->session->setFlash('error', 'Failed to update message');
            }
        }

        return $this->render('message-form', ['title' => 'Edit message', 'model' => $model]);
    }

    public function actionDeleteMessage($id)
    {
        /** @var Message $message */
        $message = Message::find()->where(['id' => $id])->one();
        if ($message) {
            if ($message->delete()) {
                \Yii::$app->session->setFlash('error', 'Message was deleted');
            } else {
                \Yii::$app->session->setFlash('error', 'Failed to delete message');
            }

            $this->redirect(\Yii::$app->request->referrer);
        } else {
            throw new HttpException(404, 'No message found');
        }
    }
}

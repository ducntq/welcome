<?php
namespace app\controllers;

use app\models\forms\LoginForm;
use yii\helpers\Url;
use yii\web\Controller;

class AuthController extends Controller
{
    public $layout = 'login';

    public function actionIndex()
    {
        $model = new LoginForm();

        if (\Yii::$app->request->isPost) {
            $model->load($_POST);

            if ($model->login()) {
                return $this->redirect(Url::to('/'));
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        $this->redirect(['auth/index']);
    }
}
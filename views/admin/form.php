<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\forms\UserForm */
$this->title = 'Edit user';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit user</h3>
                </div>
                <div class="box-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'create-user-form',
                        'layout' => 'horizontal',
                        'enableClientValidation' => true
                    ]); ?>

                    <?= $form
                        ->field($model, 'username')
                        ->textInput(['placeholder' => $model->getAttributeLabel('username'), 'readonly' => true]) ?>

                    <?= $form->field($model, 'message_id')
                        ->dropDownList($messages) ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-flat', 'name' => 'login-button']) ?>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
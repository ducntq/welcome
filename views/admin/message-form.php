<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
$this->title = $title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?=$title?></h3>
                </div>
                <div class="box-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'create-message-form',
                        'layout' => 'horizontal',
                        'enableClientValidation' => true
                    ]); ?>

                    <?= $form
                        ->field($model, 'content')
                        ->textInput() ?>

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

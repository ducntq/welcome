<?php
use yii\helpers\Html;
/** @var $this yii\web\View */
/** @var \app\models\User[] $users */
$this->title = 'Manage users';
\app\assets\AppAsset::register($this);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Users List</h3>
                </div>
                <div class="box-body no-padding">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($users):?>
                                <?php foreach ($users as $user) : ?>
                                    <?php
                                    $buttonGroupConfig = [
                                        'buttons' => [
                                            \app\helpers\Html::buttonGroupLink('fa-edit', '',
                                                \yii\helpers\Url::to(['admin/edit-user', 'id' => $user->id]), 'info'),
                                            \app\helpers\Html::buttonGroupLink('fa-remove', '',
                                                \yii\helpers\Url::to(['admin/delete-user', 'id' => $user->id]), 'danger'),
                                        ]
                                    ];
                                    ?>
                                    <tr>
                                        <td><?=Html::encode($user->username)?></td>
                                        <td><?=ucfirst($user->getRoleText())?></td>
                                        <td class="text-right">
                                            <?=\yii\bootstrap\ButtonGroup::widget($buttonGroupConfig)?>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

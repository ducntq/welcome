<?php
use yii\helpers\Html;
/** @var $this yii\web\View */
/** @var \app\models\Message[] $messages */
$this->title = 'Manage messages';
\app\assets\AppAsset::register($this);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Messages List</h3>
                </div>
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <div class="btn-group">
                            <a href="<?=\yii\helpers\Url::to(['admin/create-message'])?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create message</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Content</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($messages):?>
                                <?php foreach ($messages as $message) : ?>
                                    <?php
                                    $buttonGroupConfig = [
                                        'buttons' => [
                                            \app\helpers\Html::buttonGroupLink('fa-edit', '',
                                                \yii\helpers\Url::to(['admin/edit-message', 'id' => $message->id]), 'info'),
                                            \app\helpers\Html::buttonGroupLink('fa-remove', '',
                                                \yii\helpers\Url::to(['admin/delete-message', 'id' => $message->id]), 'danger'),
                                        ]
                                    ];
                                    ?>
                                    <tr>
                                        <td><?=Html::encode($message->content)?></td>
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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $users app\models\tables\Users */
/* @var $statuses app\models\tables\Statuses */
/* @var $form yii\widgets\ActiveForm */
/* @var $rights */
/* @var $authUser */
//<?= $form->field($model, 'creator_id')->textInput(['readonly' => true, 'value' => $authUser['id']])


?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php if ($rights): ?>
        <?= $form->field($model, 'creator_id')->dropDownList(ArrayHelper::map($users->find()->all(),'id', 'username')) ?>
    <?php endif; ?>


    <?php if (!$rights): ?>
        <?= $form->field($model, 'creator_id')->dropDownList(ArrayHelper::map($authUser,'id','username'), ['disabled' => true]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'responsible_id')->dropDownList(ArrayHelper::map($users->find()->all(),'id', 'username')) ?>

    <?= $form->field($model, 'deadline')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map($statuses->find()->all(),'id', 'status')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

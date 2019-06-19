<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $users app\models\tables\Users */
/* @var $rights */
/* @var $usersList */
/* @var $authUser */
/* @var $statuses */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
?>
<div class="tasks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usersList' => $usersList,
        'statuses' => $statuses,
        'rights' => $rights,
    ]) ?>

</div>

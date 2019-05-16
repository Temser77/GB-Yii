<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $users app\models\tables\Users */
/* @var $statuses app\models\tables\Statuses */
/* @var $rights */
/* @var $authUser */

$this->title = 'Create Tasks';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'statuses' => $statuses,
        'rights' => $rights,
        'authUser' => $authUser
    ]) ?>

</div>

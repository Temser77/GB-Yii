<?php

use \yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $hidecrumbs */

$this->title = $model->name;

if (!isset($hidecrumbs)) {
    $hidecrumbs = false;
}
if (!$hidecrumbs) {
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}

switch ($model->status_id) {
    case 1:
        $statusColorClass = 'alert alert-secondary';
        break;
    case 2:
        $statusColorClass = 'alert alert-warning';
        break;
    case 3:
        $statusColorClass = 'alert alert-primary';
        break;
    case 4:
        $statusColorClass = 'alert alert-success';
        break;
    case 5:
        $statusColorClass = 'alert alert-danger';
        break;
}

?>



<div class="card">
    <?= Html::beginTag('div', ['class' => ['card-body', $statusColorClass]])?>
        <?= Html::tag('h2', Html::encode($model->name), ['class' => 'card-title']) ?>
        <h4>Автор: <?=$model->creator->username?></h4>
        <h4>Автор: <?=$model->responsible->username?></h4>
        <h4>Срок до: <?=$model->deadline?></h4>
        <?= Html::tag('p', Html::encode($model->description), ['class' => 'card-text']) ?>
    <hr>
    <p class="card-text"><small class="text-muted">Created at <?=$model->created?></small></p>
        <p class="card-text"><small class="text-muted">Last updated at <?=$model->updated?></small></p>
<?= Html::endTag('div')?>
</div>

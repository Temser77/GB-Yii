<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $hidecrumbs */

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

<div class="card" style="width: 18rem;">

        <?= Html::beginTag('div', ['class' => ['card-body', $statusColorClass]])?>
        <?= Html::tag('h2', Html::encode($model->name), ['class' => 'card-title']) ?>
        <?= Html::tag('p', Html::encode($model->description), ['class' => 'card-text']) ?>
        <p>
            <?= Html::a('...', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= Html::endTag('div')?>

</div>
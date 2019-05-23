<?php


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

//\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view">


    <?= \app\widgets\TaskPreview::widget([
        'model' => $model,

    ])?>


</div>

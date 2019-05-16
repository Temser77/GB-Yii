<?php


/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $hidecrumbs */

$this->title = $model->name;
if (!$hidecrumbs) {
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
//\yii\web\YiiAsset::register($this);
?>
<div class="tasks-view col-md-2">


    <?= \app\widgets\TaskPreview::widget([
        'model' => $model,

    ])?>


</div>

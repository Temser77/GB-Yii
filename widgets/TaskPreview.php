<?php
namespace app\widgets;

use yii\base\Widget;

class TaskPreview extends Widget {
    public $model;
    public function run() {
        return $this->render('task', [
            'model' => $this->model
        ]);
    }
}
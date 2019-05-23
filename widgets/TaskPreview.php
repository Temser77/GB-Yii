<?php
namespace app\widgets;

use yii\base\Widget;
use app\models\tables\Tasks;
use yii\db\Exception;

class TaskPreview extends Widget {
    public $model;
    public function run() {
        if(is_a($this->model, Tasks::class)) {
            return $this->render('task', [
                'model' => $this->model
            ]);
        }
        throw new \Exception('Неправильный объект');
    }
}
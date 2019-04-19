<?php
namespace app\controllers;

use app\models\Task;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TaskController extends Controller {
    public function actionIndex() {
        $model = new Task();
        $model->setAttributes([
            'title' => 'Изучение Yii2',
            'description' => 'Моя первая задача',
            'status' => 'Выполнена',
            'author' => 'Петя',
            'responsible' => 'Вася',
        ]);
        var_dump($model->validate());
        var_dump($model->getErrors());


        //return $this->render('task');


    }


}
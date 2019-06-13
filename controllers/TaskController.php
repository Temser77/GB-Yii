<?php
namespace app\controllers;


use app\models\tables\Users;
use Codeception\Module\Redis;
use Yii;
use yii\web\Controller;


class TaskController extends Controller {
    public function actionIndex() {


        $cache = Yii::$app->cache;

        $data = $cache->get('number');

        if ($data === false) {
            $number = rand(1, 1000);
            var_dump($number);
            $cache->set('number', $number, 10);
        }

        var_dump($data);


        //$cache->addValue('number', $number, 10);

    }


}
<?php
/**
 * Created by PhpStorm.
 * User: post.user14
 * Date: 19.04.2019
 * Time: 17:28
 */

namespace app\controllers;


use yii\web\Controller;

class DbController extends Controller
{
    public
    function actionIndex()
    {
        $result = \Yii::$app->db->createCommand("
        SELECT * FROM categories
        ")->queryOne();

        var_dump($result);
        exit;
    }
}
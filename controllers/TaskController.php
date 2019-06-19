<?php
namespace app\controllers;


use app\models\tables\Tasks;
use app\models\tables\Users;
use Codeception\Module\Redis;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;


class TaskController extends Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {



        $date = date('Y-m-d', strtotime('+1 day'));
        $tasks = Tasks::find()->where(['=','deadline',$date])->indexBy('id')->all();
        $totalTasks = count($tasks);
        var_dump($tasks);
        exit;
        //Console::startProgress(0, $totalTasks);
        echo 'start';
        $i = 0;
        foreach ($tasks as $task) {
            Yii::$app->mailer->compose()
                ->setFrom('noreply@mail.com')
                ->setTo($task->responsible->email)
                ->setSubject("Уведомление о дедлайне задачи №{$task->id}")
                ->setTextBody("До окончания срока выполнения задачи №{$task->id} '{$task->name}' осталось меньше месяца")
                ->send();
            //Console::updateProgress(1, $totalTasks);
            sleep(0.5);
            $i++;
            echo "$i/$totalTasks";
        }
        echo 'done';

     /*   $tasks = Tasks::find()->where(['<','deadline','2019-06-15'])->indexBy('id')->all();
        echo count($tasks);

        exit;

        foreach ($tasks as $task) {
            Yii::$app->mailer->compose()
                ->setFrom('noreply@mail.com')
                ->setTo($task->responsible->email)
                ->setSubject("Уведомление о дедлайне задачи №{$task->id}")
                ->setTextBody("До окончания срока выполнения задачи №{$task->id} '{$task->name}' осталось меньше месяца")
                ->send();
        }
*/


    }


}
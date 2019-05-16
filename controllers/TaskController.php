<?php
namespace app\controllers;


use app\models\tables\Users;
use Yii;
use yii\web\Controller;


class TaskController extends Controller {
    public function actionIndex() {
        //$model = new Users();
        //$array = $model->find()->select('id')->all();
        //$ar = ArrayHelper::toArray($model->find()->all());
        //$arr = ArrayHelper::map(app\models\tables\Users::find()->all(),'id', 'username');

        $users = new Users();
        var_dump($users->findOne(['username' => Yii::$app->user->identity->username])->toArray(['id', 'username']));
exit;
        /* var_dump(Task::find()
             ->select("name, description")
             ->where("id > :id")
             ->params([":id" => 2])
             ->all()
         );  //SELECT * FROM task*/
        //return $this->render('task');


    }


}
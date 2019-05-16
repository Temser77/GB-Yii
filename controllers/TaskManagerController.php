<?php

namespace app\controllers;

use app\models\tables\Statuses;
use Yii;
use app\models\tables\Users;
use app\models\tables\Tasks;
use app\models\filters\TasksFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * TaskManagerController implements the CRUD actions for Tasks model.
 */
class TaskManagerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!isset(Yii::$app->user->identity->username)) {
            return $this->redirect(['cannotcreate']);
        }
        $model = new Tasks();
        $users = new Users();
        $statuses = new Statuses();
        $rights = $this->checkUserRights();


        $authUser[] = $users->findOne(['username' => Yii::$app->user->identity->username])->toArray(['id', 'username']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
            'statuses' => $statuses,
            'rights' => $rights,
            'authUser' => $authUser
        ]);
    }

    public function actionCannotcreate() {
        return $this->render('cannotcreate');
    }


    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!isset(Yii::$app->user->identity->username)) {
            return $this->redirect(['cannotcreate']);
        }
        $model = $this->findModel($id);
        $users = new Users();
        $statuses = new Statuses();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        $authUser[] = $users->findOne(['username' => Yii::$app->user->identity->username])->toArray(['id', 'username']);

        return $this->render('update', [
            'model' => $model,
            'users' => $users,
            'statuses' => $statuses,
            'rights' => true,
            'authUser' => $authUser
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function checkUserRights() {
        return Yii::$app->user->identity->username == 'admin';
        }
}

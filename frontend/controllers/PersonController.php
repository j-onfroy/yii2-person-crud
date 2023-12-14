<?php
namespace frontend\controllers;
use common\models\Person;
use frontend\models\PersonForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PersonController extends Controller
{
    public function actionIndex()
    {
        $query=Person::find();
        $sort= new Sort([
            'attributes'=>[
                'first_name',
                'last_name'
            ]
        ]);
        $provider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>3
            ],
            'sort'=>$sort
        ]);
        return $this->render('index',[
            'dataProvider'=>$provider
        ]);
    }
    public function actionCreate()
    {
        $model = new Person();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            if($model->save()){
                \Yii::$app->session->setFlash('success','User saved to database');
                return $this->redirect('index');
            }else{
                \Yii::$app->session->setFlash('error','Failed to save');
            }
        }
        return $this->render('create',['model'=>$model]);
    }

    public function actionUpdate($id)
    {

        $model  = Person::findOne(['id' => intval($id)]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           Yii::$app->getSession()->setFlash('success', 'Data saved !!!!');
            return $this->redirect('index');
        }

        return $this->render('update',['model'=>$model]);
    }

    public function actionView($id)
    {

        return $this->render('view',['id'=>$id]);
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete($id): \yii\web\Response
    {
        $model=$this->findModel($id);

        if($model->delete()){
            Yii::$app->session->setFlash('success','User deleted successfully');
        }else{
            Yii::$app->session->setFlash('error','Failed in delete');
        }
        return $this->redirect(['index']);
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($id): ?Person
    {
        if(($model=Person::findOne($id))!=null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

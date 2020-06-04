<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\base\Model;



class ProfileController extends \yii\web\Controller
{

    

    public function actionIndex()
    {
        //$model = new User();
        $model = $this->findModel(\Yii::$app->user->identity->id);

        if (empty($model)){
            return $this->render('error');
        }else{
            return $this->render('index', [
                'model' => $model,
            ]);
        }

    }

    public function actionEdit($id)
    {
        
        $model = $this->findModel($id);

        if (!empty($model->username) && !empty($model->email)) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        }
        //else error

        return $this->render('edit', [
            'model' => $model,
        ]);
        

    }
    
    


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }





}

<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

class EmployeeController extends Controller
{
    public $modelClass = 'app\common\models\Employee';
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}

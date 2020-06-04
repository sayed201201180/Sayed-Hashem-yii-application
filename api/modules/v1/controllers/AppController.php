<?php
namespace api\modules\v1\controllers;

use yii\rest\Controller;
use Yii;
use yii\filters\VerbFilter;




/**
 * APP controller
 */
class AppController extends Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => HttpBearerAuth::className(),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['POST', 'GET'],
                    
                ],
            ],
        ];
    }
    

    public function beforeAction($action)
    {   
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $message = "Data contains the API endpoints with their corrosponding allowed methods";  
        $message_ar = "Data contains the API endpoints with their corrosponding allowed methods";  
        $data = self::behaviors()['verbs']['actions'];
        
        return self::response(true,1, $message,$message_ar, $data);
    }

    
    function response($success,$status, $message,$message_ar, $data=null)
    {
        if(isset($data) && $data !== '') return ['success'=>$success,'status'=>$status, 'message'=>$message,'message_ar'=>$message_ar, 'data'=>$data];
        else return ['success'=>$success,'status'=>$status, 'message'=>$message,'message_ar'=>$message_ar];
    }
    
    function getInput($request, $index, $default=null)
    {
        if($request->get($index))
        {
            return $request->get($index);
        }
        else if($request->post($index))
        {
            return $request->post($index);
        }
        
        return $default;
    }
    
    
    
    function varSet($var)
    {
        /*
        This function used check if parameter is set and not empty
        */
        if($var != null && trim($var) != ''){
            return true;
        }
        else{
            return false;
        }
        
    }
}

<?php
namespace api\modules\v1\controllers;

use yii\rest\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

use yii\validators\EmailValidator;
//use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\helpers\StringHelper;
use yii\helpers\FileHelper;

use api\common\models\ApiAccessToken;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

use backend\models\Order2;



/**
 * APP controller
 */
class AppController extends Controller
{
    
    //public $modelClass = 'api\modules\v1\models\Employee';

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
                    'get-orders'=> ['POST', 'GET'],
                    'get-order'=> ['POST', 'GET'],
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

    public function actionGetOrders(){
        //$order = Order::find()->select('orderID, productID, quantity')->where(['orderID'=>1])->one();
        $order = Order2::find()->all();

        if($order){
            $details  = \yii\helpers\ArrayHelper::toArray($order);
            
            $success =true;
            $status = 1;
            $message = 'Retrieved successfully';
            $message_ar = "تم استردادها بنجاح";
            $data = $details;
        }
        else
        {
            $success = false;
            $status = 0;
            $message = "No Data found";
            $message_ar = "لم يتم العثور على نتائج";
            $data = '';
        }

        return self::response($success,$status, $message,$message_ar, $data);

    }


    public function actionGetOrder(){
        
        $request = Yii::$app->request;
        
        $orderID = self::getInput($request, 'orderID');
        if(self::varSet($orderID)){
                $order = Order2::find()->where(['orderID'=>$orderID])->one();
                if($order){
                    
                    $details  = \yii\helpers\ArrayHelper::toArray($order);
                    
                                
                    $success =true;
                    $status = 1;
                    $message = 'Retrieved successfully';
                    $message_ar = "تم استردادها بنجاح";
                    $data = $details;
        
                } 
                else
                {
                    $success = false;
                    $status = 0;
                    $message = "No Class found";
                    $message_ar = "لم يتم العثور على نتائج";
                    $data = '';
                }
        }
        else{
            $success = false;
            $status = 2;
            $message = "Missing data";
            $message_ar = "Missing data";
            $data = ''; 
        }
        return self::response($success,$status, $message,$message_ar, $data);
        
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

<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\db\Query;
use app\models\Store;
use app\models\Product;
use app\models\Order;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $data1 = $this->getTotalProducts();
        $totalProducts = $this->getQueryResult($data1);

        $data2 = $this->getTotalStores();
        $totalStores = $this->getQueryResult($data2);

        $data3 = $this->getTotalOrders();
        $totalOrders = $this->getQueryResult($data3);

        //$data4 = $this->getProductSales();
        
        //echo $this->getHighestSelling($data4);


        return $this->render('index', [
            'totalProducts' => $totalProducts,
            'totalStores' => $totalStores,
            'totalOrders' => $totalOrders,
            //'productSales' => $productSales,
        ]);


        
    
    }
    
        
    
    
    
    
    private function getTotalProducts()
    {
        return Product::find()
        ->select(['count(*)'])
            ->asArray()
            ->all();
    }

    private function getTotalStores()
    {
        return Store::find()
        ->select(['count(*)'])
            ->asArray()
            ->all();
    }

    private function getTotalOrders()
    {
        return Order::find()
        ->select(['count(*)'])
            ->asArray()
            ->all();
    }

    private function getProductSales()
    {
        return Order::find()
        ->select(['productID', 'sum(quantity)'])
        ->groupBy('productID')
        ->asArray()
        ->all();
    }


    private function getProductName($pID)
    {
        return Product::find()
        ->select(['productName'])
        ->where(['productID' => [$pID]])
            ->asArray()
            ->all();
    }




    private function getQueryResult($data)
    {
        //$content = '<table class="table">';
        
        $answer = NULL;
        
        foreach ($data as $datum) {
            //$content .= "<tr>";
            foreach ($datum as $key => $value) {
                //$content .= "<td>$value</td>";
                $answer = $value;
            }
            //$content .= "</tr>";
        }
        //$content .= '</table>';
        //return $this->renderContent($content);
        //return $this->renderContent($product->totalProducts);
        return $answer;
    }


    private function getHighestSelling($data)
    {
        $answer = NULL;
        
        
        foreach ($data as $datum) {
            foreach ($datum as $key => $value) {

                if ($answer < $value){
                    $answer = $value;
                }
            }          
        }
        
        return $answer;
    }



    
        //return Product::find()
        
        //->select(['*', 'AVG(salary) as avg_salary'])
                //->groupBy('emp_no')
                //->having('AVG(salary) > 60000')
                //->orderBy('AVG(salary)')
            //->limit(10)
            //->asArray()
            //->all();
        /*
        return Employee::find()
            ->select(["CONCAT(first_name, ' ', last_name) as full_name"])
            ->limit(10)
    //            ->where([
    //                'emp_no' => ['10001', '10002']
    //            ])
    //            ->andWhere(['gender' => 'M'])
    //            ->offset(10)
            ->asArray()
            ->column();
        */
    //}


    
    


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

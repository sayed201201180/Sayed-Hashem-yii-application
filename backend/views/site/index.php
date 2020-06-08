<?php

/* @var $this yii\web\View */


//use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\db\Query;
use app\models\Store;
use app\models\Product;
use app\models\Order;
use backend\controllers\SiteController;

$this->title = 'Dashboard';
?>
<div class="site-index">

    <!--<div class="jumbotron">-->
    <div class="row" style="height: 100px">

    <div class="row" style="height: 45%">
        <div class="col-lg-3">
        <center><h2>Total Revenue</h2></center></div>
        <div class="col-lg-3">
        <center><h2>Total Orders</h2></center></div>
        <div class="col-lg-3">
        <center><h2>Total Stores</h2></center></div>
        <div class="col-lg-3">
        <center><h2>Total Products</h2></center></div>

        <!--<p><a class="btn btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>
    <div class="row" style="height: 55%">
        <div class="col-lg-3">
        <center><h3>no.</h3></center></div>
        <div class="col-lg-3">
        <center><h3><?php echo $totalOrders; ?></h3></center></div>
        <div class="col-lg-3">
        <center><h3><?php echo $totalStores; ?></h3></center></div>
        <div class="col-lg-3">
        <center><h3><?php echo $totalProducts; ?></h3></center></div>
    </div>
    </div>
    

    <div class="body-content">
    <div class="row" style="height: 70px"></div>

        <div class="row">
            <div class="col-lg-4">
                

                <center><a class="btn btn-lg btn-success" href="/store/index">Stores</a></center>

            </div>
            <div class="col-lg-4">
                

            <center><a class="btn btn-lg btn-success" href="/product/index">Products</a></center>

            </div>
            <div class="col-lg-4">
                

            <center><a class="btn btn-lg btn-success" href="/order/index">Orders</a></center>

            </div>
        </div>

    </div>
    <div class="row" style="height: 40px"></div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Store with highest sales</h2>

                ...
            </div>
            <div class="col-lg-4">
                <h2>Most popular product</h2>

                ...
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>

    </div>
</div>

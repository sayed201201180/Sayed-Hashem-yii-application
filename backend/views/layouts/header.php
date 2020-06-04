<?php
use yii\helpers\Html;
use \yii\web\View;
/* @var $this \yii\web\View */
/* @var $content string */

?>
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <?= Html::a('<b>
                        <!--This is dark logo icon--><img src="'.Yii::$app->request->baseUrl.'/images/yii-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="'.Yii::$app->request->baseUrl.'/images/yii-logo.png" alt="home" class="light-logo" width="25" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="'.Yii::$app->request->baseUrl.'/images/yii-logo.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="'.Yii::$app->request->baseUrl.'/images/yii-logo.png" alt="home" class="light-logo" width="25" />
                     </span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                    <!-- /.Megamenu -->
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
<!--
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
-->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                        <img src="<?= Yii::$app->request->baseUrl ?>/images/user-logo.jpg" alt="user-img" width="36" class="img-circle">
                        <b class="hidden-xs"><?= \yii\helpers\Html::encode(\Yii::$app->user->identity->username) ?></b><span class="caret"></span> </a>
                        <?php } ?>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>                            
                                <div class="dw-user-box">

                                <?php if (!Yii::$app->user->isGuest) { ?>
                                    <div class="u-img" style="width: 20%"><img src="<?= Yii::$app->request->baseUrl ?>/images/user-logo.jpg" alt="user" /></div>
                                    <div class="u-text" style="float: right">
                                        <h4><?= \yii\helpers\Html::encode(\Yii::$app->user->identity->username) ?></h4>
                                        <p class="text-muted"><?= \yii\helpers\Html::encode(\Yii::$app->user->identity->email) ?></p>
                                        <?=Html::a('View Profile', ['/profile/index'],['class'=>'btn btn-rounded btn-green btn-sm'])?></div>
                                <?php } ?>
                                </div>
                            </li>
                            <?php
                            if (\Yii::$app->user->can('accessSettings')) {
                            ?>
                            <li role="separator" class="divider"></li>
                            <li><?=Html::a('<i class="ti-settings"></i> Setting', ['/settings'])?></li>
                            <?php
                            }
                            ?>
                            <li role="separator" class="divider"></li>
                            <li><?= Html::a(
                                    '<i class="fa fa-power-off"></i> Logout',
                                    ['/site/logout','ft'=>0],
                                    ['data-method' => 'post','id'=>'logout-btn']
                                ) ?></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
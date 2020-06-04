<?php
use yii\helpers\Html;
use yii\widgets\Menu;
?>
<?php
$script = <<< JS
       (function() {
       
       $(".slimscrollsidebar").slimScroll({
            height: "100%",
            position: "right",
            size: "6px",
            color: "rgba(0,0,0,0.3)",
            start  : $("li.active")
        })
 
            if($('#side-menu li.active').is(':last-child')){
                $(".slimscrollsidebar").slimScroll({ scrollBy: '60px' });
            }
            else if($('#side-menu li.active').is(":nth-last-child(2)")){
                $(".slimscrollsidebar").slimScroll({ scrollBy: '60px' });
            }
            else if($('#side-menu li.active').is(":nth-last-child(3)")){
                $(".slimscrollsidebar").slimScroll({ scrollBy: '120px' });
            }
            else if($('#side-menu li.active').is(":nth-child(2)")){
                $(".slimscrollsidebar").slimScroll({ scrollBy: '-120px' });
            }
            else{
                $(".slimscrollsidebar").slimScroll({ scrollBy: '-60px' });
            }

       
    })();
JS;

$this->registerJs($script);

?>

<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Menu</span></h3> </div>
        <?= Menu::widget( //common\widgets\Menu::widget(
            [
                'options' => ['class' => 'nav','id' => 'side-menu'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'mdi mdi-av-timer', 'url' => ['/site/index']],
                    ['label' => 'System Users', 'icon' => 'mdi mdi-account-box', 'url' => ['/user'],'visible' => Yii::$app->user->can('listUser')], 
                    ['class' => 'devider','visible' => (Yii::$app->user->can('listCategory') || Yii::$app->user->can('listStore') || Yii::$app->user->can('listOrder') || Yii::$app->user->can('listAdvertisement'))],
                    ['label' => 'Categories', 'icon' => 'mdi mdi-tag-multiple', 'url' => ['/category'],'visible' => Yii::$app->user->can('listCategory')], 
                    ['label' => 'Stores', 'icon' => '<img src="/images/store-icon-side.png" alt="store-img" style="margin-right: 11px;">', 'url' => ['/store'],'visible' => Yii::$app->user->can('listStore')], 
                    ['label' => 'Orders', 'icon' => 'mdi mdi-cart-outline', 'url' => ['/order'],'visible' => Yii::$app->user->can('listOrder')], 
                    ['label' => 'Advertisements', 'icon' => 'fas fa-ad sticon', 'url' => ['/advertisement'],'visible' => Yii::$app->user->can('listAdvertisement')], 
                    ['class' => 'devider'],
                    ['label' => 'Information', 'icon' => 'mdi mdi-information-outline', 'url' => ['/information'],'visible' => Yii::$app->user->can('updateInformation')],
                    ['label' => 'Settings', 'icon' => 'mdi mdi-settings', 'url' => ['/settings'],'visible' => Yii::$app->user->can('accessAppSettings')],
                
                ],
            ]
        ) ?>
            </div>
        </div>

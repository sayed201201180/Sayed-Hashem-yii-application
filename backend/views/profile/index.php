<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form ActiveForm */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="profile-index">

<div class="row"><div class="col-lg-7">

<div class="row">
    <div class="col-lg-4">
        <h1><?= Html::encode('Your '.$this->title) ?></h1></div>

    <div class="col-lg-8" >
    <h1><?= Html::a('Edit Profile', ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></h1>
    


    </div>

</div><div class="row"></div>

<div class="row">
    <div class="col-lg-2"><h3 class="text-muted">Username</h3></div>
    <div class="col-lg-9"><h3><?= $model->username ?></h3></div> <?php //\yii\helpers\Html::encode(\Yii::$app->user->identity->username) ?>
</div>
<div class="row">
    <div class="col-lg-2"><h3 class="text-muted">E-mail</h3></div>
    <div class="col-lg-9"><h3><?= $model->email ?></h3></div>
</div>
<div class="row">
    <div class="col-lg-2"><h3 class="text-muted">Status</h3></div>
    <div class="col-lg-9"><h3><?= $model->status ?></h3></div>
</div>
<div class="row">
    <div class="col-lg-2"><h3 class="text-muted">Created</h3></div>
    <div class="col-lg-9"><h3><?= $model->created_at ?></h3></div>
</div>
<div class="row">
    <div class="col-lg-2"><h3 class="text-muted">Updated</h3></div>
    <div class="col-lg-9"><h3><?= $model->updated_at ?></h3></div>
</div>    

</div>

<div class="col-lg-5"><img src="<?= Yii::$app->request->baseUrl ?>/images/afkary-avatar.png" width=300 height=300></div>



</div>


</div><!-- profile -->



<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-edit">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,]) ?>

</div>


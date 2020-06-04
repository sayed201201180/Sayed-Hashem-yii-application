<?php
namespace backend\components;

use Yii;
//use yii\common\models\User;

/**
 * Extended yii\web\User
 *
 * This allows us to do "Yii::$app->user->something" by adding getters
 * like "public function getSomething()"
 *
 * So we can use variables and functions directly in `Yii::$app->user`
 */
class User extends \yii\web\User
{
    public function getEmail()
    {
        return \Yii::$app->user->identity->email;
    }
    public function getName()
    {
        return \Yii::$app->user->identity->username;
    }
    public function getType()
    {
        return \Yii::$app->user->identity->type;
    }
}
<?php

namespace api\common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "api_user".
 *
 * @property integer $id
 * @property string $purpose
 * @property integer $status
 * @property string $access_token
 *
 */
 
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 20;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%api_user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purpose', 'access_token'], 'required'],
            [['status'], 'integer'],
            [['purpose'], 'string', 'max' => 255],
            [['access_token'], 'string', 'max' => 32],
            [['purpose'], 'unique'],
            [['access_token'], 'unique'],
        ];
    }

/**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAccess_token()
    {
        return $this->access_token;
    }

    public function generateAccess_token()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        
    }
}

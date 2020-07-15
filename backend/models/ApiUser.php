<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "api_user".
 *
 * @property int $id
 * @property string $purpose
 * @property string $access_token
 * @property int $status
 */
class ApiUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purpose', 'access_token'], 'required'],
            [['status'], 'integer'],
            [['purpose'], 'string', 'max' => 255],
            [['access_token'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purpose' => 'Purpose',
            'access_token' => 'Access Token',
            'status' => 'Status',
        ];
    }
}

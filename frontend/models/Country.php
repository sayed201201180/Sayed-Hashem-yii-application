<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $cID
 * @property string $cCode
 * @property string $cName
 * @property int|null $cPopulation
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cCode', 'cName'], 'required'],
            [['cPopulation'], 'integer'],
            [['cCode'], 'string', 'max' => 3],
            [['cName'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cID' => 'C ID',
            'cCode' => 'C Code',
            'cName' => 'C Name',
            'cPopulation' => 'C Population',
        ];
    }
}

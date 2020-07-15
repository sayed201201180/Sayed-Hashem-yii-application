<?php

namespace common\models;


use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "employee".
 *
 * @property int $empID
 * @property string $empName
 * @property float|null $empSalary
 * @property string|null $empPosition
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empName'], 'required'],
            [['empSalary'], 'number'],
            [['empName'], 'string', 'max' => 40],
            [['empPosition'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empID' => 'Emp ID',
            'empName' => 'Emp Name',
            'empSalary' => 'Emp Salary',
            'empPosition' => 'Emp Position',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $orderID
 * @property int|null $productID
 * @property int|null $quantity
 *
 * @property Product $product
 */
class Order extends \yii\db\ActiveRecord
{
    
    //public $productSales;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'quantity'], 'integer'],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productID' => 'productID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderID' => 'Order ID',
            'productID' => 'Product ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['productID' => 'productID']);
    }
}

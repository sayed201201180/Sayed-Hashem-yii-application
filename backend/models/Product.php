<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $productID
 * @property string $productName
 * @property string|null $productDesc
 * @property float|null $productPrice
 * @property int|null $storeID
 * 
 *
 * @property Order[] $orders
 * @property Store $store
 */
class Product extends \yii\db\ActiveRecord
{
    //public $totalProducts;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productName'], 'required'],
            [['productPrice'], 'number'],
            [['storeID'], 'integer'],
            [['productName'], 'string', 'max' => 100],
            [['productDesc'], 'string', 'max' => 500],
            [['storeID'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['storeID' => 'storeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productID' => 'Product ID',
            'productName' => 'Product Name',
            'productDesc' => 'Product Desc',
            'productPrice' => 'Product Price',
            'storeID' => 'Store ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['productID' => 'productID']);
    }

    /**
     * Gets query for [[Store]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['storeID' => 'storeID']);
    }
}

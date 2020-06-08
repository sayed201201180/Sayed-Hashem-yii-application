<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property int $storeID
 * @property string $storeName
 * @property string|null $storeDesc
 *
 * @property Product[] $products
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['storeName'], 'required'],
            [['storeName'], 'string', 'max' => 100],
            [['storeDesc'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'storeID' => 'Store ID',
            'storeName' => 'Store Name',
            'storeDesc' => 'Store Desc',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['storeID' => 'storeID']);
    }
}

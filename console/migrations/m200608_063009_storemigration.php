<?php

use yii\db\Migration;

/**
 * Class m200608_063009_storemigration
 */
class m200608_063009_storemigration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /*$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }*/

        $this->createTable('{{%store}}', [
            'storeID' => $this->primaryKey(),
            'storeName' => $this->string(100)->notNull(),
            'storeDesc' => $this->string(500)
        ]);

        $this->createTable('{{%product}}', [
            'productID' => $this->primaryKey(),
            'productName' => $this->string(100)->notNull(),
            'productDesc' => $this->string(500),
            'productPrice' => $this->double(),
            'storeID' => $this->integer()
        ]);

        $this->addForeignKey('FK_product_store', '{{%product}}', 'storeID', '{{%store}}', 'storeID');

        $this->createTable('{{%order}}', [
            'orderID' => $this->primaryKey(),
            'productID' => $this->integer(),
            'quantity' => $this->integer()
        ]);

        $this->addForeignKey('FK_order_product', '{{%order}}', 'productID', '{{%product}}', 'productID');

        $this->insert('{{%store}}',[
            'storeID' => 1,
            'storeName' => 'Carrefour',
            'storeDesc' => 'Huge Supermarket'
        ]);

        $this->insert('{{%store}}',[
            'storeID' => 2,
            'storeName' => 'Zara',
            'storeDesc' => 'High end fashion'
        ]);

        $this->insert('{{%store}}',[
            'storeID' => 3,
            'storeName' => 'Jashamal',
            'storeDesc' => 'Famous bookstore'
        ]);

        /////////////////////////////

        $this->insert('{{%product}}',[
            'productID' => 1,
            'productName' => 'Large Basmati rice sack',
            'productDesc' => '10 kg white rice',
            'productPrice' => 2.5,
            'storeID' => 1
        ]);

        $this->insert('{{%product}}',[
            'productID' => 2,
            'productName' => 'Large Lays Salted',
            'productDesc' => 'Yellow bag of salted Lays chips',
            'productPrice' => 0.7,
            'storeID' => 1
        ]);

        $this->insert('{{%product}}',[
            'productID' => 3,
            'productName' => 'American Garden Sliced Jalapenos',
            'productDesc' => 'Sliced pickled jalapenos',
            'productPrice' => 1.1,
            'storeID' => 1
        ]);

        $this->insert('{{%product}}',[
            'productID' => 4,
            'productName' => 'White shirt',
            'productDesc' => 'Fine cotton formal long sleeve white shirt',
            'productPrice' => 7.2,
            'storeID' => 2
        ]);

        $this->insert('{{%product}}',[
            'productID' => 5,
            'productName' => 'Black suit jacket',
            'productDesc' => 'Fine italian style suit jacket',
            'productPrice' => 21,
            'storeID' => 2
        ]);

        $this->insert('{{%product}}',[
            'productID' => 6,
            'productName' => 'Black dress shoes',
            'productDesc' => 'Shiny fine leather black shoes',
            'productPrice' => 16,
            'storeID' => 2
        ]);

        $this->insert('{{%product}}',[
            'productID' => 7,
            'productName' => 'Coding for beginners',
            'productDesc' => 'Learn coding basics for a bright future in programming',
            'productPrice' => 7,
            'storeID' => 3
        ]);

        $this->insert('{{%product}}',[
            'productID' => 8,
            'productName' => 'Cooking for kids',
            'productDesc' => 'Teach your kids how to safely cook',
            'productPrice' => 4,
            'storeID' => 3
        ]);

        $this->insert('{{%product}}',[
            'productID' => 9,
            'productName' => 'Learn french in 6 months',
            'productDesc' => 'Follow our program to learn french through daily practice',
            'productPrice' => 3.5,
            'storeID' => 3
        ]);

        ///////////////////////////////////////

        $this->insert('{{%order}}',[    'productID' => 1, 'quantity' => 2   ]);
        $this->insert('{{%order}}',[    'productID' => 1, 'quantity' => 2   ]);
        $this->insert('{{%order}}',[    'productID' => 2, 'quantity' => 2   ]);
        $this->insert('{{%order}}',[    'productID' => 2, 'quantity' => 3   ]);
        $this->insert('{{%order}}',[    'productID' => 2, 'quantity' => 4   ]);
        $this->insert('{{%order}}',[    'productID' => 2, 'quantity' => 5   ]);
        $this->insert('{{%order}}',[    'productID' => 3, 'quantity' => 2   ]);
        $this->insert('{{%order}}',[    'productID' => 4, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 4, 'quantity' => 3   ]);
        $this->insert('{{%order}}',[    'productID' => 4, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 5, 'quantity' => 2   ]);
        $this->insert('{{%order}}',[    'productID' => 6, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 6, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 7, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 7, 'quantity' => 3   ]);
        $this->insert('{{%order}}',[    'productID' => 7, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 7, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 8, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 8, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 9, 'quantity' => 1   ]);
        $this->insert('{{%order}}',[    'productID' => 1, 'quantity' => 1   ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m200608_063009_storemigration cannot be reverted.\n";
        //return false;
        $this->dropForeignKey('FK_product_store','{{%product}}');
        $this->dropForeignKey('FK_order_product','{{%order}}');
        $this->dropTable('{{%order}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%store}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_063009_storemigration cannot be reverted.\n";

        return false;
    }
    */
}

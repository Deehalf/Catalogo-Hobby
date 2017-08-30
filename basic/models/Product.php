<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_product}}".
 *
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_description
 * @property string $product_image
 * @property integer $product_featured
 * @property string $product_category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_description', 'product_image', 'product_category'], 'required'],
            [['product_description'], 'string'],
            [['product_featured'], 'integer'],
            [['product_name', 'product_image', 'product_category'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_description' => 'Product Description',
            'product_image' => 'Product Image',
            'product_featured' => 'Product Featured',
            'product_category' => 'Product Category',
        ];
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}

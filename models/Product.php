<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_description', 'product_category'], 'required'],
            [['product_description'], 'string'],
            [['product_featured'], 'boolean'],
            [['product_name', 'product_image', 'product_category'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Nombre del Producto',
            'product_description' => 'Descripción del producto',
            'product_image' => 'Product Image',
            'product_featured' => '¿Producto destacado?',
            'product_category' => 'Categoria del producto',
            'imageFile' => 'Imagen del Producto'
        ];
    }



    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('images/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
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

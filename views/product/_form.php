<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= field($model, 'product_image')-> $model->product_name; ?>

    <?= $form->field($model, 'product_featured')->dropDownList(array('No','Si'),[array(FALSE,TRUE)]) ?>

    <?= $form->field($model, 'product_category')->dropDownList(array('Escoja una categoria','cosa','cosa con imagen'),[array(NULL,'cosa','cosa con imagen')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

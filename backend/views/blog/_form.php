<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'category')->label('栏目')->checkboxList(Category::dropDownList()) ?>

    <?= $form->field($model, 'file_url')->widget('manks\FileInput', []); ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

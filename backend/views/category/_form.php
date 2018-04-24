<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cid')->textInput() ?>
    <?= $form->field($model, 'iden')->textInput() ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'keywords')->textInput() ?>
    <?= $form->field($model, 'desc')->textInput() ?>
    <?= $form->field($model, 'oid')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'price_per_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wine_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'order_dt')->textInput() ?>

    <?= $form->field($model, 'ordered_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'futures_flg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exp_delivery_dt')->textInput() ?>

    <?= $form->field($model, 'delivery_location')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

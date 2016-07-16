<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\OrdersSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'qty') ?>

    <?= $form->field($model, 'price_per_unit') ?>

    <?= $form->field($model, 'wine_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'order_dt') ?>

    <?php // echo $form->field($model, 'ordered_from') ?>

    <?php // echo $form->field($model, 'futures_flg') ?>

    <?php // echo $form->field($model, 'exp_delivery_dt') ?>

    <?php // echo $form->field($model, 'delivery_location') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

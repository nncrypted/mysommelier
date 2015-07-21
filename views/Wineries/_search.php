<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WineriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wineries-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'winery_name') ?>

    <?= $form->field($model, 'default_appellation_id') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'proprietor_name') ?>

    <?php // echo $form->field($model, 'winemaker_name') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

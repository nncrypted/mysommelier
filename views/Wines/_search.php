<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\WinesSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wines-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'wine_name') ?>

    <?= $form->field($model, 'winery_id') ?>

    <?= $form->field($model, 'appellation_id') ?>

    <?= $form->field($model, 'wine_year') ?>

    <?php // echo $form->field($model, 'wine_varietal_id') ?>

    <?php // echo $form->field($model, 'bottle_size') ?>

    <?php // echo $form->field($model, 'upc_barcode') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'overall_rating') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Locations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cellar_loc_id')->textInput() ?>

    <?= $form->field($model, 'cellar_id')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

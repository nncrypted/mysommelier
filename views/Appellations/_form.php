<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Appellations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appellations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'appellation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'common_flg')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

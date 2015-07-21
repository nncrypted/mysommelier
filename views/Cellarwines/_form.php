<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cellarwines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cellarwines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cellar_id')->textInput() ?>

    <?= $form->field($model, 'wine_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellar_loc_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

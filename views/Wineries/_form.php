<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Wineries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wineries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'winery_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_appellation_id')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proprietor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'winemaker_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

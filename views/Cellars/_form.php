<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cellars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cellars-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'cellar_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_cellar_loc_id')->textInput() ?>

	<?= \nemmo\attachments\components\AttachmentsInput::widget([
		'id' => 'file-input', // Optional
		'model' => $model,
		'options' => [ // Options of the Kartik's FileInput widget
			'multiple' => true, // If you want to allow multiple upload, default to false
		],
		'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget 
			'maxFileCount' => 10 // Client max files
		]
	]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

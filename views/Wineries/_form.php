<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Wineries $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wineries-form">

    <?php 
		$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); 
		echo Form::widget(
			[
				'model' => $model,
				'form' => $form,
				'columns' => 1,
				'attributes' => [
					'winery_name' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Winery Name...', 'maxlength'=>45]], 
					'default_appellation_id' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Default Appellation ID...']], 
					'created_at' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Created At...']], 
					'updated_at' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Updated At...']], 
					'proprietor_name' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Proprietor Name...', 'maxlength'=>45]], 
					'winemaker_name' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Winemaker Name...', 'maxlength'=>45]], 
					'phone' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Phone...', 'maxlength'=>12]], 
					'website' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Website...', 'maxlength'=>128]], 
					'description' => ['type' => Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Description...', 'maxlength'=>255]], 
			    ]
			]
		);
		echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
		ActiveForm::end(); 
	?>

</div>

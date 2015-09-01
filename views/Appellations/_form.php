<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Appellations $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="appellations-form">

	<?php
	$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
	echo Form::widget([
		'model' => $model,
		'form' => $form,
		'columns' => 1,
		'attributes' => [
			'country' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Country...', 'maxlength' => 45]],
			'region_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Region ID...']],
			'app_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter App Name...', 'maxlength' => 45]],
			'common_flg' => ['type' => Form::INPUT_CHECKBOX],
		]
	]);
	echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
	ActiveForm::end();
	?>

</div>

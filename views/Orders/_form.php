<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Orders $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="orders-form">

    <?php 
		$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); 
		echo Form::widget([
			'model' => $model,
			'form' => $form,
			'columns' => 1,
			'attributes' => [
				'wine_id'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Wine ID...']], 
				'futures_flg'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Futures Flg...', 'maxlength'=>1]], 
				'qty'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Qty...']], 
				'price_per_unit'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Price Per Unit...', 'maxlength'=>10]], 
				'ordered_from'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Ordered From...', 'maxlength'=>45]], 
				'user_id'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter User ID...']], 
				'order_dt'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATE]], 
				'exp_delivery_dt'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATE]], 
				'delivery_location'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Delivery Location...', 'maxlength'=>45]], 
			]
		]);
		echo Html::submitButton(
			$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
			['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
		);
		ActiveForm::end(); 
	?>

</div>

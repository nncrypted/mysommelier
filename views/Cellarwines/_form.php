<?php

use app\models\Cellars;
use app\models\Wines;
use app\models\Locations;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Cellarwines $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="cellarwines-form">

    <?php 
		$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); 
		echo Form::widget([
			'model' => $model,
			'form' => $form,
			'columns' => 1,
			'attributes' => [
				'cellar_id'=>[
					'type'=> Form::INPUT_DROPDOWN_LIST, 
					'items'=>ArrayHelper::map(Cellars::find()->orderBy('cellar_name')->asArray()->all(), 'id', 'cellar_name'),
				], 
				'wine_id'=>[
					'type'=> Form::INPUT_DROPDOWN_LIST, 
					'items'=>ArrayHelper::map(Wines::find()->orderBy('wine_name')->asArray()->all(), 'id', 'wine_name'),
				], 
				'quantity'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Quantity...']], 
				'cellar_loc_id'=>[
					'type'=> Form::INPUT_DROPDOWN_LIST, 
					'items'=>ArrayHelper::map(Locations::find()->orderBy('loc_name')->asArray()->all(), 'id', 'loc_name'),
				], 
				'rating'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Rating...']], 
				'created_at'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Created At...']], 
				'updated_at'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Updated At...']], 
				'cost'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Cost...', 'maxlength'=>10]], 
			]
		]);
		echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
		ActiveForm::end(); 
	?>

</div>

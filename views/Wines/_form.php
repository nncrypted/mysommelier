<?php

use app\models\Wineries;
use app\models\Appellations;
use app\models\Varietals;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Wines $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="wines-form">
    <?php 
		$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); 
		
		echo Form::widget([
			'model' => $model,
			'form' => $form,
			'columns' => 1,
			'attributes' => [
				'upc_barcode'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Upc Barcode...', 'maxlength'=>30]], 
				'wine_name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Wine Name...', 'maxlength'=>45]], 
				'winery_id'=>[
					'type'=> Form::INPUT_DROPDOWN_LIST, 
					'items'=>ArrayHelper::map(Wineries::find()->orderBy('winery_name')->asArray()->all(), 'id', 'winery_name'),
				], 
				'appellation_id'=>[
					'type'=> Form::INPUT_DROPDOWN_LIST, 
					'items'=>ArrayHelper::map(Appellations::find()->orderBy('app_name')->asArray()->all(), 'id', 'app_name'),
				], 
				'wine_year'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Wine Year...', 'maxlength'=>4]], 
				'wine_varietal_id'=>[
					'type'=> Form::INPUT_DROPDOWN_LIST, 
					'items'=>ArrayHelper::map(Varietals::find()->orderBy('varietal_name')->asArray()->all(), 'id', 'varietal_name'),
				], 
				'bottle_size'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Bottle Size...', 'maxlength'=>15]], 
				'bottle_size'=>[
					'type'=>Form::INPUT_DROPDOWN_LIST,
					'items'=>Yii::$app->params['bottle_sizes'],
				],
				'overall_rating'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Overall Rating...']], 
				'created_at'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Created At...']], 
				'updated_at'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Updated At...']], 
				'description'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Description...', 'maxlength'=>255]], 
			]
		]);
		echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
		ActiveForm::end(); 
	?>
</div>

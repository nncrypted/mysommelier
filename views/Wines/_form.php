<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Wineries;
use app\models\Appellations;
use app\models\Varietals;

/* @var $this yii\web\View */
/* @var $model app\models\Wines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wines-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'upc_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wine_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'winery_id')->dropDownList(ArrayHelper::map(Wineries::find()->all(), 'id', 'winery_name')) ?>

    <?= $form->field($model, 'appellation_id')->dropDownList(ArrayHelper::map(Appellations::find()->all(), 'id', 'appellation')) ?>

    <?= $form->field($model, 'wine_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wine_varietal_id')->dropDownList(ArrayHelper::map(Varietals::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'bottle_size')->dropDownList(Yii::$app->params['bottle_sizes']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'overall_rating')->textInput() ?>

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

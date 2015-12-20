<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WinesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wines-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
		'options' => ['enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'wine_name') ?>

    <?= $form->field($model, 'winery_id') ?>

    <?= $form->field($model, 'appellation_id') ?>

    <?= $form->field($model, 'wine_year') ?>

	<?= \nemmo\attachments\components\AttachmentsTable::widget(['model' => $model]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

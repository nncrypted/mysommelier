<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CellarsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cellars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
		'options' => ['enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'owner_id') ?>

    <?= $form->field($model, 'cellar_name') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'default_cellar_loc_id') ?>

	<?= \nemmo\attachments\components\AttachmentsTable::widget(['model' => $model]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

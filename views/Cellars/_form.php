<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Cellars $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="cellars-form">

    <?php 
        $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); 
        echo Form::widget([
            'model' => $model,
            'form' => $form,
            'columns' => 1,
            'attributes' => [
                'cellar_name'=>[
                    'type'=> Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter Cellar Name...', 'maxlength'=>45]
                ], 
                'created_at'=>[
                    'type'=> Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter Created At...']
                ], 
                'default_cellar_loc_id'=>[
                    'type'=> Form::INPUT_TEXT, 
                    'options'=>['placeholder'=>'Enter Default Cellar Loc ID...']
                ], 
            ]
        ]);
        echo Html::submitButton(
            $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), 
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        );
        ActiveForm::end(); 
    ?>
</div>

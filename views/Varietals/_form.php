<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Varietals $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="varietals-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'varietal_name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Varietal Name...', 'maxlength'=>45]], 

'common_flg'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Common Flg...', 'maxlength'=>1]], 

'varietal_type'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Varietal Type...', 'maxlength'=>10]], 

'description'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Description...', 'maxlength'=>255]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>

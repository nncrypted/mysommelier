<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wines */

$this->title = 'Create Wines';
$this->params['breadcrumbs'][] = ['label' => 'Wines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

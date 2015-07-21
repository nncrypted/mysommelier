<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cellars */

$this->title = 'Create Cellars';
$this->params['breadcrumbs'][] = ['label' => 'Cellars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

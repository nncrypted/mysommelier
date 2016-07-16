<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Cellars $model
 */

$this->title = 'Update Cellars: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cellars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cellars-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

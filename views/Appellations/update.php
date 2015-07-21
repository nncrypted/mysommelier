<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appellations */

$this->title = 'Update Appellations: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appellations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appellations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Varietals $model
 */

$this->title = 'Update Varietals: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Varietals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="varietals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

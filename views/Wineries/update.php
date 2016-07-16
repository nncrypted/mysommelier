<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Wineries $model
 */

$this->title = 'Update Wineries: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wineries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wineries-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

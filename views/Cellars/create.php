<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Cellars $model
 */

$this->title = 'Create Cellars';
$this->params['breadcrumbs'][] = ['label' => 'Cellars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellars-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

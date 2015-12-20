<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Wines $model
 */

$this->title = 'Create Wines';
$this->params['breadcrumbs'][] = ['label' => 'Wines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wines-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Appellations $model
 */

$this->title = 'Create Appellations';
$this->params['breadcrumbs'][] = ['label' => 'Appellations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appellations-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

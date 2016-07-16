<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Varietals $model
 */

$this->title = 'Create Varietals';
$this->params['breadcrumbs'][] = ['label' => 'Varietals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varietals-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

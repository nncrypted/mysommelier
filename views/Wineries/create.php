<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Wineries $model
 */

$this->title = 'Create Wineries';
$this->params['breadcrumbs'][] = ['label' => 'Wineries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wineries-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Cellarwines $model
 */

$this->title = 'Add Wine to Cellar';
$this->params['breadcrumbs'][] = ['label' => 'Cellarwines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellarwines-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

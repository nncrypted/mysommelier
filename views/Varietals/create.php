<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Varietals */

$this->title = 'Create Varietals';
$this->params['breadcrumbs'][] = ['label' => 'Varietals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varietals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

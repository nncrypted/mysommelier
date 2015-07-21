<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cellarwines */

$this->title = 'Create Cellarwines';
$this->params['breadcrumbs'][] = ['label' => 'Cellarwines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellarwines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

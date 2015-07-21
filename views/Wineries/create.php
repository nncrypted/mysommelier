<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wineries */

$this->title = 'Create Wineries';
$this->params['breadcrumbs'][] = ['label' => 'Wineries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wineries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

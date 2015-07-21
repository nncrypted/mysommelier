<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CellarLocations */

$this->title = 'Update Cellar Locations: ' . ' ' . $model->cellar_loc_id;
$this->params['breadcrumbs'][] = ['label' => 'Cellar Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cellar_loc_id, 'url' => ['view', 'id' => $model->cellar_loc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cellar-locations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

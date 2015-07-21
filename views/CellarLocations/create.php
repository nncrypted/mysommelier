<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CellarLocations */

$this->title = 'Create Cellar Locations';
$this->params['breadcrumbs'][] = ['label' => 'Cellar Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellar-locations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

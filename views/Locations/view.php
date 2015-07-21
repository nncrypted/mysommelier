<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locations */

$this->title = $model->cellar_loc_id;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cellar_loc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cellar_loc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cellar_loc_id',
            'cellar_id',
            'location',
        ],
    ]) ?>

</div>

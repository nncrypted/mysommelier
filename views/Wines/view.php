<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wines */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wines-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'wine_name',
            'winery_id',
            'appellation_id',
            'wine_year',
            'wine_varietal_id',
            'bottle_size',
            'upc_barcode',
            'description',
            'overall_rating',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

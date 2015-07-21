<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CellarwinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cellarwines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellarwines-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cellarwines', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cellar_id',
            'wine_id',
            'quantity',
            'rating',
            // 'created_at',
            // 'updated_at',
            // 'cost',
            // 'cellar_loc_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

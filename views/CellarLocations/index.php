<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CellarLocationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cellar Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellar-locations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cellar Locations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cellar_loc_id',
            'cellar_id',
            'location',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

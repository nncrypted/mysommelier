<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppellationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appellations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appellations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Appellations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Country',
                'attribute' => 'country',
                'options' => ['style'=>'max-width: 400px; min-width: 100px;'],
            ],
            'appellation',
            'region.region_name',
            [
                'label' => 'Common?',
                'attribute' => 'common_flg',
                'options' => ['style'=>'max-width: 400px; min-width: 100px;'],
            ],
            'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

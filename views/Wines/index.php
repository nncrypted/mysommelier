<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wines-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wines', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'winery.winery_name',
            [
				'attribute' => 'wine_name',
				'contentOptions'=>['style'=>'min-width: 300px;'],
			],
            [
				'attribute' => 'wineVarietal.name',
				'contentOptions'=>['style'=>'min-width: 200px;'],
			],
            [
				'attribute' => 'wine_year',
				'contentOptions'=>['style'=>'max-width: 50px;'],
			],
            [
				'attribute' => 'appellation.appellation',
				'contentOptions'=>['style'=>'min-width: 200px;'],
			],
            // 'bottle_size',
            // 'upc_barcode',
            // 'description',
            // 'overall_rating',
            // 'created_at',
            // 'updated_at',
            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions'=>['style'=>'min-width: 75px;'],
			],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WineriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wineries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wineries-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wineries', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'winery_name',
            'defaultAppellation.country',
            'defaultAppellation.appellation',
            'website',
            'phone',
            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions'=>['style'=>'min-width: 75px;'],
			],
        ],
    ]); ?>

</div>

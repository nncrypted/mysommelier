<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VarietalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Varietals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varietals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Varietals', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
				'label' => 'Name',
				'attribute' => 'name',
			],
            [
				'label' => 'Common?',
				'attribute' => 'common_flg',
				'contentOptions'=>['style'=>'max-width: 50px;'],
			],
            [
				'label' => 'Varietal Type',
				'attribute' => 'varietal_type',
				'contentOptions'=>['style'=>'max-width: 50px;'],
			],
            [
				'label' => 'Description',
				'attribute' => 'description',
				'contentOptions'=>['style'=>'min-width: 600px;'],
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'contentOptions'=>['style'=>'min-width: 75px;'],

			],
        ],
    ]); ?>

</div>

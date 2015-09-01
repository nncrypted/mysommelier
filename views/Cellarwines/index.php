<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\CellarwinesSearch $searchModel
 */

$this->title = 'Cellar Wines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellarwines-index">
    <div class="page-header">
		<h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Cellarwines', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php 
		Pjax::begin(); 
		echo GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				[
					'attribute' => 'cellar_name',
					'value' => 'cellar.cellar_name',
					'contentOptions' => ['style' => 'width:120px;'],
				],
				[
					'attribute' => 'wine_year',
					'value' => 'wine.wine_year',
					'contentOptions' => ['style' => 'width:40px;'],
				],
				[
					'attribute' => 'winery_name',
					'value' => 'wine.winery.winery_name',
					'contentOptions' => ['style' => 'width:150px;'],
				],
				[
					'attribute' => 'varietal_name',
					'value' => 'wine.wineVarietal.varietal_name',
				],
				[
					'attribute' => 'wine_name',
					'value' => 'wine.wine_name',
				],
				[
					'attribute' => 'quantity',
					'value' => 'quantity',
					'hAlign' => GridView::ALIGN_CENTER,
					'contentOptions' => ['style' => 'width:40px;'],
				],
				[
					'attribute' => 'rating',
					'value' => 'rating',
					'hAlign' => GridView::ALIGN_CENTER,
					'contentOptions' => ['style' => 'width:40px;'],
				],
				[
					'attribute' => 'loc_name',
					'value' => 'cellarLoc.loc_name',
					'contentOptions' => ['style' => 'width:100px;'],
				],
				[
					'class' => 'yii\grid\ActionColumn',
					'buttons' => [
						'update' => function ($url, $model) {
							return Html::a(
								'<span class="glyphicon glyphicon-pencil"></span>', 
								Yii::$app->urlManager->createUrl(['cellarwines/view','id' => $model->id,'edit'=>'t']), 
								[
									'title' => Yii::t('yii', 'Edit'),
								]
							);
						}
					],
				],
			],
			'responsive'=>true,
			'hover'=>true,
			'condensed'=>true,
			'floatHeader'=>true,
			'toolbar' => [
				[
					'content'=>
						Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) 
							. ' '.
						Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-default','title' => 'Reset']),
				],
				'{export}',
				'{toggleData}'
			],
			'panel' => [
				'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
//				'type'=>'info',
				'type'=>GridView::TYPE_PRIMARY,
//				'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),                                                                                                                                                          'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
				'showFooter'=>false
			],
		]); 
		Pjax::end(); 
	?>

</div>

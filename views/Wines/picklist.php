<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Appellations;
use app\models\Wineries;
use app\models\Varietals;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\WinesSearch $searchModel
 */

$this->title = 'Wine Picklist';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wines-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Wines', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php 
		Pjax::begin(); 
		echo GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'pjax'=>true,
			'columns' => [
				[
					'attribute' => 'winery_id',
					'header' => 'Winery',
					'value' => 'winery.winery_name',
					'width' => '170px',
					'filterType' => GridView::FILTER_SELECT2,
					'filter' =>
						ArrayHelper::map(Wineries::find()
							->orderBy('winery_name')
							->asArray()
							->all(),
							'id', 'winery_name'
						),
					'filterWidgetOptions' => [
						'pluginOptions' => [
							'allowClear' => true,
							'width' => '170px',
						],
					],
					'filterInputOptions' => [
						'placeholder' => 'Any Winery'
					],
				],
				[
					'attribute' => 'wine_year',
					'value' => 'wine_year',
					'hAlign' => GridView::ALIGN_CENTER,
					'width' => '90px',
				],
				[
					'attribute' => 'wine_varietal_id',
					'header' => 'Varietal',
					'value' => 'wineVarietal.varietal_name',
					'width' => '170px',
					'filterType' => GridView::FILTER_SELECT2,
					'filter' =>
						ArrayHelper::map(Varietals::find()
							->orderBy('varietal_name')
							->asArray()
							->all(),
							'id', 'varietal_name'
						),
					'filterWidgetOptions' => [
						'pluginOptions' => [
							'allowClear' => true,
							'width' => '200px',
						],
					],
					'filterInputOptions' => [
						'placeholder' => 'Any Varietal'
					],
				],
	            'wine_name',
				[
					'attribute' => 'appellation_id',
					'header' => 'Appellation',
					'value' => 'appellation.app_name',
					'width' => '200px',
					'filterType' => GridView::FILTER_SELECT2,
					'filter' =>
						ArrayHelper::map(Appellations::find()
							->orderBy('app_name')
							->asArray()
							->all(),
							'id', 'app_name'
						),
					'filterWidgetOptions' => [
						'pluginOptions' => [
							'allowClear' => true,
							'width' => '200px',
						],
					],
					'filterInputOptions' => [
						'placeholder' => 'Any appellation'
					],
				],
				[
					'attribute' => 'bottle_size',
					'value' => 'bottle_size',
					'hAlign' => GridView::ALIGN_CENTER,
					'width' => '90px',
					'filterType' => GridView::FILTER_SELECT2,
					'filter' =>	Yii::$app->params['bottle_sizes'],
					'filterWidgetOptions' => [
						'pluginOptions' => [
							'allowClear' => true,
							'width' => '90px',
						],
					],
					'filterInputOptions' => [
						'placeholder' => 'Any size'
					],
				],
				[
					'attribute' => 'overall_rating',
					'value' => 'overall_rating',
					'hAlign' => GridView::ALIGN_CENTER,
					'width' => '100px',
				],
				[
					'class' => 'kartik\grid\ActionColumn',
                    'template' => '{select}',
					'width' => '70px',
					'buttons' => [
						'select' => 
							function ($url, $model) {
								return Html::a(
									'<span class="glyphicon glyphicon-ok"></span>', 
									Yii::$app->urlManager->createUrl(
										['cellarwines/create','wine_id' => $model->id,'edit'=>'t']
									), 
									[
										'title' => Yii::t('yii', 'Add this wine to your cellar'),
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
						Html::a('<i class="glyphicon glyphicon-plus"></i><b>New Wine</b>', ['wines/create', ['fromCellarWines' => $fromCellarWines]], ['class' => 'btn btn-success','title' => 'Add New Wine']) 
							. ' '.
						Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['cellarwines/index'], ['class' => 'btn btn-default','title' => 'Cancel']),
				],
				'{export}',
				'{toggleData}'
			],
			'panel' => [
				'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
				'type'=>GridView::TYPE_PRIMARY,
				'showFooter'=>false
			],
		]); 
		Pjax::end(); 
	?>
</div>

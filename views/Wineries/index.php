<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\WineriesSearch $searchModel
 */

$this->title = 'Wineries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wineries-index">
    <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Wineries', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php 
		Pjax::begin(); 
		echo GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				'winery_name',
				'phone',
				'website', 
				'proprietor_name',
				[
					'class' => 'yii\grid\ActionColumn',
//					'width' => '70px',
					'buttons' => [
						'update' => 
							function ($url, $model) {
								return Html::a(
									'<span class="glyphicon glyphicon-pencil"></span>', 
									Yii::$app->urlManager->createUrl(
										[
											'wineries/view',
											'id' => $model->id,
											'edit'=>'t'
										]
									), 
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
			'panel' => [
				'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
				'type'=>'info',
				'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Winery', ['create'], ['class' => 'btn btn-success']),                                                                                                                                                          'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
				'showFooter'=>false
			],
		]); 
		Pjax::end(); 
	?>

</div>

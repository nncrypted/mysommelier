<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CellarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cellars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cellars', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cellar_name',
            'cellarusers.username',
            'default_cellar_loc_id',
            'created_at',

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{users} {view} {update} {delete}',
				'buttons' => [
					'users' => function ($url, $model) {
						return Html::a(
							'<span class="glyphicon glyphicon-arrow-download"</span>',
							['cellarusers/index', 'id' => $model->id], 
							[
								'title' => 'Cellar Users',
								'data-pjax' => '0',
							]
						);
					},
				],
			],
		],
    ]); ?>

</div>

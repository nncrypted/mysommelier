<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cellars */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cellars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cellars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'owner_id',
            'cellar_name',
            'created_at',
            'default_cellar_loc_id',
        ],
    ]) ?>

	<div>
	<p>
		<?= \nemmo\attachments\components\AttachmentsTable::widget(['model' => $model]) ?>
	</p>
	<?php
		if (isset($model->files[0]))
		{
			echo Html::img($model->files[0]->url, ['alt' => 'The Image']);
		}
	?>
	</div>

</div>

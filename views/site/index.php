<?php
    use yii\helpers\Html;
    use app\models\Wines;
    use app\models\Wineries;
    
    /* @var $this yii\web\View */
	$this->title = 'My Sommelier';
?>
<div class="site-index">
    <div class="jumbotron">
        <h2>Welcome to My Sommelier</h2>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h3>Wine of the Day</h3>
				<div>
                    <table>
                        <col width="80">
                        <col width="200">
                        <tr>
                            <td>Winery</td><td><?= Html::encode($wineRecord->winery->winery_name) ?></td>
                        </tr>
                        <tr>
                            <td>Year</td><td><?= Html::encode($wineRecord->wine_year) ?></td>
                        </tr>
                        <tr>
                            <td>Varietal</td><td><?= Html::encode($wineRecord->wineVarietal->varietal_name) ?></td>
                        </tr>
                        <tr>
                            <td>Name</td><td><?= Html::encode($wineRecord->wine_name) ?></td>
                        </tr>
                    </table>
				</div>
            </div>
            <div class="col-lg-4">
                <h3>Label Image</h3>

                <p>
					<?php
						if (isset($wineRecord->files[0]))
						{
							echo Html::img($wineRecord->files[0]->url, ['alt' => 'The Image']);
						}
					?>
				</p>
            </div>
        </div>
    </div>

</div>

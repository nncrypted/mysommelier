<?php
	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use app\assets_b\AppAsset;

	/* @var $this \yii\web\View */
	/* @var $content string */

	AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
			$mobDetect = \Yii::$app->params['detect'];
			$devType = '';
			if ($mobDetect['isMobile'])
			{
				$devType = '- Mobile';
			}
			if ($mobDetect['isTablet'])
			{
				$devType = '- Tablet';
			}
            NavBar::begin([
                'brandLabel' => 'My Sommelier ' . $devType,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    [
						'label' => 'My Cellars', 
						'items' => [
							['label' => 'Wines', 'url' => ['/cellarwines/index']],
							['label' => 'Orders', 'url' => ['/orders/index']],
							['label' => 'Cellars', 'url' => ['/cellars/index']],
						],
						'visible' => !Yii::$app->user->isGuest,
					],
                    [
						'label' => 'Reference Data', 
						'items' => [
							['label' => 'Wine Details', 'url' => ['/wines/index']],
							['label' => 'Regions', 'url' => ['/regions/index']],
							['label' => 'Appellations', 'url' => ['/appellations/index']],
							['label' => 'Varietals', 'url' => ['/varietals/index']],
							['label' => 'Wineries', 'url' => ['/wineries/index']],
						],
						'visible' => !Yii::$app->user->isGuest,
					],
                    [
						'label' => 'Site Admin', 
						'items' => [
							['label' => 'User Mgmt', 'url' => ['/user/admin/index']],
							['label' => 'API Access', 'url' => ['/test/index']],
						],
						'visible' => !Yii::$app->user->isGuest,
					],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
						['label' => 'Sign in', 'url' => ['/user/security/login']] :
						['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
							'url' => ['/user/security/logout'],
							'linkOptions' => ['data-method' => 'post']],
					['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Jim Kreth <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

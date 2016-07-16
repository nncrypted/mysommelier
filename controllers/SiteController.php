<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AppConfig;
use app\models\Wines;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		//Get the wotd
		$wotd = AppConfig::findOne(1);

		$allWines = new Wines();
        $currentDateTime = new \DateTime("now", new \DateTimeZone('America/Chicago'));
        $wotdDateTime = new \DateTime($wotd->wotd_dt, new \DateTimeZone('America/Chicago'));
        $diff = $currentDateTime->diff($wotdDateTime);

        if ($diff->days > 0)
        {
            $wineOfTheDay = $allWines->getRandomWine();
            $wotd->wotd_id = $wineOfTheDay->id;
            $wotd->wotd_dt = $currentDateTime->format('Y-m-d H:i:s');
            $wotd->save();
        }
        else
        {
            $wineOfTheDay = $allWines->findOne($wotd->wotd_id);
            if (!isset($wineOfTheDay))
            {
                $wineOfTheDay = $allWines->getRandomWine();
                $wotd->wotd_id = $wineOfTheDay->id;
                $wotd->wotd_dt = $currentDateTime->format('Y-m-d H:i:s');
                $wotd->save();
            }
        };

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        return $this->render('index', ['wineRecord' => $wineOfTheDay]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}

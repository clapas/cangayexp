<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\LoginForm;
use common\models\Activity;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ActivitySearch;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\base\Controller;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'container';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ]
        ];
    }

    public function actionIndex()
    {
        $activity = Activity::find()->where('start_ts > now()')->orderBy('start_ts asc')->one();
        $this->layout = 'front';
        return $this->render('index', [
            'activity' => $activity
        ]);
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

    public function actionActivities() {
        return $this->render('catalog_es');
    }
    public function actionContact() {
        return $this->render('contact_es');
    }

    public function actionEnrol() {
        return $this->render('enrol_es', [
            'activity' => Yii::$app->request->get('activity'),
            'start_ts' => Yii::$app->request->get('start_ts')
        ]);
    }
    public function actionOrders() {
        return $this->render('orders_es');
    }
    public function actionGroups() {
        return $this->render('groups_es');
    }
    public function actionAbout() {
        $activitySearch = new ActivitySearch();
        $activitySearch->start_ts = date('Y-m-d');
        $upcoming_activities = $activitySearch->search(Yii::$app->request->queryParams);
        $upcoming_activities->query->orderBy('start_ts asc');
        $upcoming_activities->query->limit(3);
        $upcoming_activities->pagination = false;
        return $this->render('about_es', compact('upcoming_activities'));
    }
    public function actionConditions() {
        return $this->render('conditions_es');
    }
    public function actionPrivacy() {
        return $this->render('privacy_es');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}

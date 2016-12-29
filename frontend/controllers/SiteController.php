<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\LoginForm;
use common\models\Activity;
use frontend\models\PasswordResetRequestForm;
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
        $activity = Activity::find()->one();
        $titles = ArrayHelper::map($activity->getTitles()->asArray()->all(), 'language_code', 'title');
        $activity->title = $titles[Yii::$app->language];
        if ($activity->title) $activity->title = $titles[Yii::$app->sourceLanguage];
        $subtitles = ArrayHelper::map($activity->getSubtitles()->asArray()->all(), 'language_code', 'subtitle');
        $activity->subtitle = $subtitles[Yii::$app->language];
        if ($activity->subtitle) $activity->subtitle = $subtitles[Yii::$app->sourceLanguage];
        $descriptions = ArrayHelper::map($activity->getDescriptions()->asArray()->all(), 'language_code', 'description');
        $activity->description = $descriptions[Yii::$app->language];
        if (!$activity->description) $activity->description = $descriptions[Yii::$app->sourceLanguage];
        $itineraries = ArrayHelper::map($activity->getItineraries()->asArray()->all(), 'language_code', 'itinerary');
        $activity->itinerary = $itineraries[Yii::$app->language];
        if (!$activity->itinerary) $activity->itinerary = $itineraries[Yii::$app->sourceLanguage];
        $includeses = ArrayHelper::map($activity->getIncludes()->asArray()->all(), 'language_code', 'includes');
        $activity->includes = $includeses[Yii::$app->language];
        if (!$activity->includes) $activity->includes = $includeses[Yii::$app->sourceLanguage];
        $noteses = ArrayHelper::map($activity->getNotes()->asArray()->all(), 'language_code', 'notes');
        $activity->notes = $noteses[Yii::$app->language];
        if (!$activity->notes) $activity->notes = $noteses[Yii::$app->sourceLanguage];
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
        return $this->render('catalog');
    }
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about_es');
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

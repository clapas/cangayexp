<?php

namespace frontend\controllers;

use Yii;

use common\models\Language;
use common\models\Activity;
use common\models\ActivityDescription;
use common\models\ActivityFile;
use common\models\ActivityTitle;

use frontend\models\ActivitySearch;

use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends Controller
{
    public $layout = 'container';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitySearch();
        $searchModel->start_ts = date('Y-m-d');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->defaultPageSize = 4;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	$model = $this->findModel($id);
	$titles = ArrayHelper::map($model->getTitles()->asArray()->all(), 'language_code', 'title');
	$descriptions = ArrayHelper::map($model->getDescriptions()->asArray()->all(), 'language_code', 'md_content');
	$title = $titles[Yii::$app->language] ? $titles[Yii::$app->language] : $titles[Yii::$app->sourceLanguage];
	$description = $descriptions[Yii::$app->language] ? $descriptions[Yii::$app->language] : $descriptions[Yii::$app->sourceLanguage];
        return $this->render('view', [
            'model' => $model,
	    'model_title' => $title,
	    'model_description' => $description
        ]);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

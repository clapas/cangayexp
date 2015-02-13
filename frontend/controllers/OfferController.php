<?php

namespace frontend\controllers;

use Yii;

use common\models\Language;
use common\models\Offer;
use common\models\OfferDescription;
use common\models\OfferFile;
use common\models\OfferTitle;

use frontend\models\OfferSearch;

use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * OfferController implements the CRUD actions for Offer model.
 */
class OfferController extends Controller
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
     * Lists all Offer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OfferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Offer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	$model = $this->findModel($id);
	$titles = ArrayHelper::map($model->getOfferTitles()->asArray()->all(), 'language_code', 'title');
	$descriptions = ArrayHelper::map($model->getOfferDescriptions()->asArray()->all(), 'language_code', 'md_content');
	$title = $titles[Yii::$app->language] ? $titles[Yii::$app->language] : $titles[Yii::$app->sourceLanguage];
	$description = $descriptions[Yii::$app->language] ? $descriptions[Yii::$app->language] : $descriptions[Yii::$app->sourceLanguage];
        return $this->render('view', [
            'model' => $model,
	    'model_title' => $title,
	    'model_description' => $description
        ]);
    }

    /**
     * Finds the Offer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

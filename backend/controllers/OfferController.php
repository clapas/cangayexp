<?php

namespace backend\controllers;

require_once 'smartfile/BasicClient.php';

use Yii;

use backend\models\OfferForm;
use backend\models\OfferSearch;

use common\models\Language;
use common\models\Offer;
use common\models\OfferDescription;
use common\models\OfferFile;
use common\models\OfferTitle;

use yii\filters\AccessControl;
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
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Offer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OfferForm();
	$languages = ArrayHelper::map(Language::find()->all(), 'code', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            foreach ($model->titles as $lang => $title) {
	        if (in_array($lang,  array_keys($languages))) {
		    $ot = new OfferTitle();
		    $ot->title = $title;
		    $ot->offer_id = $model->id;
		    $ot->language_code = $lang;
		    $ot->save();
		}
	    }
            foreach ($model->descriptions as $lang => $desc) {
	        if (in_array($lang,  array_keys($languages))) {
		    $od = new OfferDescription();
		    $od->md_content = $desc;
		    $od->offer_id = $model->id;
		    $od->language_code = $lang;
		    $od->save();
		}
	    }
            $model->files = UploadedFile::getInstances($model, 'files');

	    $err = '';
            if ($model->files && $model->validate()) {
                $key = Yii::$app->params['SF_API_KEY'];
                $pass = Yii::$app->params['SF_API_PWD'];
                $path =  Yii::$app->params['SF_data_path'];
                $client = new \BasicClient($key, $pass);
                foreach ($model->files as $file) {
                    try {
                        $rh = fopen($file->tempName, 'rb');
                        $response = $client->post($path, array($file->name => $rh));
		    } catch (Exception $e) {
		        echo $e->getMessage();
			die;
		    }
                    $offerFile = new OfferFile();
                    $offerFile->url = Yii::$app->params['SF_base_url'] . $file->name;
                    $offerFile->offer_id = $model->id;
                    $offerFile->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
		'languages' => $languages
            ]);
        }
    }

    /**
     * Updates an existing Offer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$languages = ArrayHelper::map(Language::find()->all(), 'code', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
		'languages' => $languages
            ]);
        }
    }

    /**
     * Deletes an existing Offer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        if (($model = OfferForm::findOne($id)) !== null) {
	    $model->titles = ArrayHelper::map($model->getOfferTitles()->all(), 'language_code', 'title');
	    $model->descriptions = ArrayHelper::map($model->getOfferDescriptions()->all(), 'language_code', 'md_content');
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

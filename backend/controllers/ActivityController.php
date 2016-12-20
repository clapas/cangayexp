<?php

namespace backend\controllers;

require_once 'smartfile/BasicClient.php';

use Yii;

use backend\models\ActivityForm;
use backend\models\ActivitySearch;

use common\models\Language;
use common\models\Activity;
use common\models\ActivityDescription;
use common\models\ActivityFile;
use common\models\ActivityTitle;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ActivityController implements the CRUD actions for Offer model.
 */
class ActivityController extends Controller
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
                    'delete' => ['post'],
                    'delete-file' => ['post']
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
        $searchModel = new ActivitySearch();
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
     * Finds the Offer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActivityForm::findOne($id)) !== null) {
	    $model->titles = ArrayHelper::map($model->getActivityTitles()->asArray()->all(), 'language_code', 'title');
	    $model->descriptions = ArrayHelper::map($model->getActivityDescriptions()->asArray()->all(), 'language_code', 'description');
	    //$model->files = $model->getActivityFiles()->asArray()->all();
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActivityForm();
	$languages = ArrayHelper::map(Language::find()->asArray()->all(), 'code', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveRelations($model, $languages);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
		'languages' => $languages
            ]);
        }
    }
    protected function saveRelations($model, $languages) {
        foreach ($model->titles as $lang => $title) {
            if (in_array($lang,  array_keys($languages))) {
		$ot = ActivityTitle::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
		if (!$ot) $ot = new ActivityTitle();
                $ot->title = $title;
                $ot->activity_id = $model->id;
                $ot->language_code = $lang;
                $ot->save();
            }
        }
        foreach ($model->descriptions as $lang => $desc) {
            if (in_array($lang,  array_keys($languages))) {
		$ad = ActivityDescription::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
                if (!$ad) $ad = new ActivityDescription();
                $ad->description = $desc;
                $ad->activity_id = $model->id;
                $ad->language_code = $lang;
                $ad->save();
            }
        }
    }
    public function actionUploadFiles($id) {
        $model = $this->findModel($id);
        $model->files = UploadedFile::getInstances($model, 'files');
        if ($model->files && $model->validate()) {
            $key = Yii::$app->params['SF_API_KEY'];
            $pass = Yii::$app->params['SF_API_PWD'];
            $path =  Yii::$app->params['SF_data_path'];
            $client = new \BasicClient($key, $pass);
            foreach ($model->files as $file) {
                $rh = fopen($file->tempName, 'rb');
                $response = $client->post($path, array($file->name => $rh));
                $activityFile = new ActivityFile();
                $activityFile->url = Yii::$app->params['SF_base_url'] . $file->name;
                $activityFile->activity_id = $model->id;
                $activityFile->save();
            }
        }
        return $this->redirect(['view', 'id' => $id]);
    }
    public function actionDeleteFile($id) {
        $model_file = ActivityFile::findOne($id); 
        $model_id = $model_file->activity_id;
        $model_file->delete();

        return $this->redirect(['view', 'id' => $model_id]);
    }
}

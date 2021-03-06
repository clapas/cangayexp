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
use common\models\ActivitySubtitle;
use common\models\ActivityIncludes;
use common\models\ActivityNotes;
use common\models\ActivityItinerary;

use yii\filters\AccessControl;
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
     * Lists all Activity models.
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
     * Displays a single Activity model.
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
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActivityForm::findOne($id)) !== null) {
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
    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$languages = ArrayHelper::map(Language::find()->all(), 'code', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveRelations($model, $languages);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
		'languages' => $languages,
            ]);
        }
    }
    protected function saveRelations($model, $languages) {
        foreach ($model->titles as $lang => $title) {
            if (in_array($lang,  array_keys($languages))) {
		$rel = ActivityTitle::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
		if (!$rel) $rel = new ActivityTitle();
                $rel->title = $title;
                $rel->activity_id = $model->id;
                $rel->language_code = $lang;
                $rel->save();
            }
        }
        foreach ($model->subtitles as $lang => $subtitle) {
            if (in_array($lang, array_keys($languages))) {
		$rel = ActivitySubtitle::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
		if (!$rel) $rel = new ActivitySubtitle();
                $rel->subtitle = $subtitle;
                $rel->activity_id = $model->id;
                $rel->language_code = $lang;
                $rel->save();
            }
        }
        foreach ($model->descriptions as $lang => $desc) {
            if (in_array($lang, array_keys($languages))) {
		$rel = ActivityDescription::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
                if (!$rel) $rel = new ActivityDescription();
                $rel->description = $desc;
                $rel->activity_id = $model->id;
                $rel->language_code = $lang;
                $rel->save();
            }
        }
        foreach ($model->includeses as $lang => $includes) {
            if (in_array($lang, array_keys($languages))) {
		$rel = ActivityIncludes::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
                if (!$rel) $rel = new ActivityIncludes();
                $rel->includes = $includes;
                $rel->activity_id = $model->id;
                $rel->language_code = $lang;
                $rel->save();
            }
        }
        foreach ($model->itineraries as $lang => $itinerary) {
            if (in_array($lang, array_keys($languages))) {
		$rel = ActivityItinerary::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
                if (!$rel) $rel = new ActivityItinerary();
                $rel->itinerary = $itinerary;
                $rel->activity_id = $model->id;
                $rel->language_code = $lang;
                $rel->save();
            }
        }
        foreach ($model->noteses as $lang => $notes) {
            if (in_array($lang, array_keys($languages))) {
		$rel = ActivityNotes::findOne(['activity_id' => $model->id, 'language_code' => $lang]);
                if (!$rel) $rel = new ActivityNotes();
                $rel->notes = $notes;
                $rel->activity_id = $model->id;
                $rel->language_code = $lang;
                $rel->save();
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
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index']);
    }
    public function actionDeleteFile($id) {
        $model_file = ActivityFile::findOne($id); 
        $model_id = $model_file->activity_id;
        $model_file->delete();

        return $this->redirect(['view', 'id' => $model_id]);
    }
}

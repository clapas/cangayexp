<?php

namespace frontend\controllers;

use Yii;

use common\models\Language;
use common\models\BlogEntry;

//use frontend\models\BlogSearch;

use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
     * Displays a single BlogEntry model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($year, $month, $day, $slug)
    {
	$model = $this->findModel($year, $month, $day, $slug);
        return $this->render('view', [
            'model' => $model
        ]);
    }
    /**
     */
    protected function findModel($year, $month, $day, $slug) {
        if (($model = BlogEntry::find()
            ->where("extract (year from post_date) = $year")
            ->andWhere("extract (month from post_date) = $month")
            ->andWhere("extract (day from post_date) = $day")
            ->andWhere(['slug' => $slug])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


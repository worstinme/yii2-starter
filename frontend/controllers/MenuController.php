<?php

namespace frontend\controllers;

use Yii;
use worstinme\zoo\frontend\models\ItemsSearch;
use worstinme\zoo\models\ApplicationsContent;
use yii\web\NotFoundHttpException;

class MenuController extends \worstinme\zoo\frontend\controllers\Controller {

    public function actionIndex()
    {
        if (($model = ApplicationsContent::findOne(['app_id'=>$this->app->id,'lang'=>$this->app->lang])) === null) {
            throw new NotFoundHttpException();
        }

        $searchModel = new ItemsSearch([
            'app_id'=>'menu',
            'state'=>1,
            'flag'=>1,
        ]);

        $searchModel->regBehaviors();
        $dataProvider = $searchModel->data(Yii::$app->request->queryParams);

        return $this->render('application', [
            'app' => $this->app,
            'model'=>$model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
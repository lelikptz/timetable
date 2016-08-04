<?php

namespace app\controllers;

use app\models\Couriers;
use app\models\Regions;
use app\models\TimeTable;
use app\models\TimeTableSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     * @return string
     */
    public function actionIndex() {
        $objModel = new TimeTableSearch();
        return $this->render('index',
            [
                'objProvider' => $objModel->search(Yii::$app->request->get()),
                'objModel' => $objModel
            ]
        );
    }

    /**
     * Displays add page.
     * @return string
     */
    public function actionAdd() {
        $objModel = new TimeTable();
        $arrRegionsModel = Regions::find()->all();

        $arrRegions = ArrayHelper::map($arrRegionsModel, 'id', 'name');
        $arrRegionsOptions = ArrayHelper::map($arrRegionsModel, 'id', 'dname');

        $arrCouriers = ArrayHelper::map(Couriers::find()->all(), 'id', 'fio');

        if ($objModel->load(Yii::$app->request->post()) && $objModel->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно добавлена в расписание');
        }

        return $this->render('add', [
            'objModel' => $objModel,
            'arrRegions' => $arrRegions,
            'arrRegionsOptions' => $arrRegionsOptions,
            'arrCouriers' => $arrCouriers
        ]);
    }
}
<?php

namespace backend\controllers;

use Yii;
use common\models\Service;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\Registration;
use common\models\Equipment;
use yii\helpers\ArrayHelper;
use common\models\Config;

/**
 * ServiceController implements the CRUD actions for Service model.
 * 
 * @property Registration $registration
 */
class ServiceController extends Controller {

    //registration
    private $registration = null;

    /**
     * @inheritdoc
     */
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
        ];
    }

    /**
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'registration' => $this->registration,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'registration' => $this->registration,
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();
        $model->date = date("Y-m-d");
        $model->no_of_grease_nipples = $this->registration->vehicleModel->no_of_nipples;

        return $this->saveService($model);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        return $this->saveService($model);
    }

    private function saveService(Service &$model)
    {
        $equipmentsArr = $this->getAllEquipments();
        $globalChargesArr = $this->getAllGlobalCharges();

//        array_shift($equipmentsArr);
//print_r($globalChargesArr);exit;
        if ($model->load(Yii::$app->request->post())) {

            $model->registration_id = $this->registration->id;
            $model->customer_id = $this->registration->customer_id;

            //********************** start equipments ************************
            if ($model->engine_oil_id) {
                $model->engine_oil = $equipmentsArr[Equipment::CAT_OIL_ENGINE][$model->engine_oil_id]['name'];
                $model->engine_oil_price = $equipmentsArr[Equipment::CAT_OIL_ENGINE][$model->engine_oil_id]['price'];
            }
            if ($model->oil_filter_id) {
                $model->oil_filter = $equipmentsArr[Equipment::CAT_FILTER_OIL][$model->oil_filter_id]['name'];
                $model->oil_filter_price = $equipmentsArr[Equipment::CAT_FILTER_OIL][$model->oil_filter_id]['price'];
            }
            if ($model->diesel_filter_id) {
                $model->diesel_filter = $equipmentsArr[Equipment::CAT_FILTER_DIESEL][$model->diesel_filter_id]['name'];
                $model->diesel_filter_price = $equipmentsArr[Equipment::CAT_FILTER_DIESEL][$model->diesel_filter_id]['price'];
            }
            if ($model->air_filter_id) {
                $model->air_filter = $equipmentsArr[Equipment::CAT_FILTER_AIR][$model->air_filter_id]['name'];
                $model->air_filter_price = $equipmentsArr[Equipment::CAT_FILTER_AIR][$model->air_filter_id]['price'];
            }
            if ($model->gear_oil_id) {
                $model->gear_oil = $equipmentsArr[Equipment::CAT_OIL_GEAR][$model->gear_oil_id]['name'];
                $model->gear_oil_price = $equipmentsArr[Equipment::CAT_OIL_GEAR][$model->gear_oil_id]['price'];
            }
            if ($model->differential_oil_id) {
                $model->differential_oil = $equipmentsArr[Equipment::CAT_OIL_DIFFERENTIAL][$model->differential_oil_id]['name'];
                $model->differential_oil_price = $equipmentsArr[Equipment::CAT_OIL_DIFFERENTIAL][$model->differential_oil_id]['price'];
            }
            if ($model->steering_oil_id) {
                $model->steering_oil = $equipmentsArr[Equipment::CAT_OIL_POWER][$model->steering_oil_id]['name'];
                $model->steering_oil_price = $equipmentsArr[Equipment::CAT_OIL_POWER][$model->steering_oil_id]['price'];
            }
            if ($model->break_oil_id) {
                $model->break_oil = $equipmentsArr[Equipment::CAT_OIL_BREAK][$model->break_oil_id]['name'];
                $model->break_oil_price = $equipmentsArr[Equipment::CAT_OIL_BREAK][$model->break_oil_id]['price'];
            }
            if ($model->coolent_oil_id) {
                $model->coolent_oil = $equipmentsArr[Equipment::CAT_OIL_COOLENT][$model->coolent_oil_id]['name'];
                $model->coolent_oil_price = $equipmentsArr[Equipment::CAT_OIL_COOLENT][$model->coolent_oil_id]['price'];
            }
            //********************** end equipments ************************
            
            
            //********************** start wash ************************
            if ($model->full_wash) {
                $model->full_wash_charge = $globalChargesArr[Config::TYPE_FULL_WASH_CHARGE];
            }
            if ($model->body_wash) {
                $model->body_wash_charge = $globalChargesArr[Config::TYPE_BODY_WASH];
            }
            if ($model->engine_wash) {
                $model->engine_wash_charge = $globalChargesArr[Config::TYPE_ENGINE_WASH];
            }
            
            $model->grease_charge = $globalChargesArr[Config::TYPE_GREASE_PER_NIPPLE];
            
            if ($model->under_wash) {
                $model->under_wash_charge = $globalChargesArr[Config::TYPE_UNDER_WASH];
            }
            if ($model->vacuume_cleaning) {
                $model->vacuume_cleaning_charge = $globalChargesArr[Config::TYPE_VACUUME_CLEANING];
            }
            $model->discount_amount = $model->getDiscountPrice();
            //********************** end wash ************************
            
            $model->total = $model->getFullTotal();

            if ($model->save()) {

                return $this->redirect(['view', 'id' => $model->id, 'rid' => $this->registration->id]);
            }
        }

        return $this->render(($model->isNewRecord) ? 'create' : 'update', [
                    'model' => $model,
                    'registration' => $this->registration,
                    'equipmentsArr' => $equipmentsArr,
                    'globalChargesArr' => $globalChargesArr,
        ]);
    }

    private function getAllEquipments()
    {
        $result = Equipment::find()->asArray()->all();
        return ArrayHelper::index($result, 'id', 'category');
    }

    private function getAllGlobalCharges()
    {
        $result = Config::find()->asArray()->all();
        return ArrayHelper::map($result, 'type', 'price');
    }

    /**
     * Deletes an existing Service model.
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
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function beforeAction($action)
    {
        $this->registration = Registration::findOne(Yii::$app->request->get('rid'));

        if ($this->registration === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return parent::beforeAction($action);
    }

}

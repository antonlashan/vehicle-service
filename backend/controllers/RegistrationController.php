<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\models\RegistrationSearch;
use common\models\Registration;
use common\models\Customer;
use common\models\Vehicle;
use common\models\VehicleModel;
use yii\helpers\ArrayHelper;
use common\models\VehicleMake;

class RegistrationController extends Controller {

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

    public function actionIndex()
    {
        $searchModel = new RegistrationSearch();
        //existing registration
        $registration = $searchModel->search(Yii::$app->request->queryParams);

        $vehicleModels = [];

        if ($registration === null) {
            $registration = new Registration();
        } else {
            $vehicleModels = $this->getVehicleModels($registration->vehicleModel->vehicle_id, $registration->vehicleModel->vehicle_make_id);
            $vehicleModels = ArrayHelper::map($vehicleModels, 'id', 'model');
        }

        if ($registration->customer === null) {
            $customer = new Customer();
        } else {
            $customer = $registration->customer;
        }

        if (Yii::$app->request->get('cc') == true) {
            $customer = new Customer();
        }

        if ($searchModel->vehicle_no && $registration->load(Yii::$app->request->post())) {

            $registration->vehicle_no = $searchModel->vehicle_no;

            if ($customer->load(Yii::$app->request->post())) {

                if ($customer->save()) {
                    $registration->customer_id = $customer->id;
                    if ($registration->save()) {
                        return $this->redirect(['service/index', 'rid' => $registration->id]);
                    }
                }
            }
        }
        $vehicleList = Vehicle::find()->asArray()->all();
        $vehicleMakeList = VehicleMake::find()->asArray()->all();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'registration' => $registration,
                    'customer' => $customer,
                    'vehicleList' => ArrayHelper::map($vehicleList, 'id', 'name'),
                    'vehicleNo' => $searchModel->vehicle_no,
                    'vehicleModels' => $vehicleModels,
                    'vehicleMakeList' => ArrayHelper::map($vehicleMakeList, 'id', 'name'),
        ]);
    }

    /**
     * 
     * @param integer $typeId vehicle type id
     * @param integer $makeId vehicle make id
     */
    protected function getVehicleModels($typeId, $makeId)
    {
        $q = VehicleModel::find();

        if ($typeId) {
            $q->andWhere(['vehicle_id' => $typeId]);
        }

        if ($makeId) {
            $q->andWhere(['vehicle_make_id' => $makeId]);
        }
        return $q->asArray()->all();
    }

    public function actionGetModels($typeId, $makeId)
    {
        $models = $this->getVehicleModels($typeId, $makeId);

        $options = '<option value="">select a model</option>';
        foreach ($models as $model) {
            $options .= "<option value=\"{$model['id']}\">{$model['model']}</option>";
        }

        echo $options;
        die();
    }

}

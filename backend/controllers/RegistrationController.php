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
use common\models\Service;

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
            $vehicleModels = $this->getVehicleModels($registration->vehicleModel->vehicle_id);
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

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'registration' => $registration,
                    'customer' => $customer,
                    'vehicleList' => ArrayHelper::map($vehicleList, 'id', 'name'),
                    'vehicleNo' => $searchModel->vehicle_no,
                    'vehicleModels' => $vehicleModels,
        ]);
    }

    /**
     * 
     * @param integer $id vehicle id
     */
    protected function getVehicleModels($id)
    {
        return VehicleModel::find()->where(['vehicle_id' => $id])->asArray()->all();
    }

    public function actionGetModels($id)
    {
        $models = $this->getVehicleModels($id);

        $options = '<option value="">select a model</option>';
        foreach ($models as $model) {
            $options .= "<option value=\"{$model['id']}\">{$model['model']}</option>";
        }

        echo $options;
        die();
    }

}

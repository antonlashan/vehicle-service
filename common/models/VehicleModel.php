<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%vehicle_model}}".
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property integer $vehicle_make_id
 * @property string $model
 * @property integer $no_of_nipples
 *
 * @property Vehicle $vehicle
 * @property VehicleMake $vehicleMake
 */
class VehicleModel extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vehicle_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'model', 'vehicle_make_id'], 'required'],
            [['vehicle_id', 'vehicle_make_id', 'no_of_nipples'], 'integer'],
            [['model'], 'string', 'max' => 20],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Type',
            'vehicle_make_id' => 'Make',
            'model' => 'Model',
            'no_of_nipples' => 'No Of Nipples',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleMake()
    {
        return $this->hasOne(VehicleMake::className(), ['id' => 'vehicle_make_id']);
    }

}

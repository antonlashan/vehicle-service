<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%vehicle}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property VehicleModel[] $vehicleModels
 */
class Vehicle extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vehicle}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleModels()
    {
        return $this->hasMany(VehicleModel::className(), ['vehicle_id' => 'id']);
    }

}

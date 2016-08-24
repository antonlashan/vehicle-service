<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%vehicle_make}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property VehicleModel[] $vehicleModels
 */
class VehicleMake extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vehicle_make}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Make',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleModels()
    {
        return $this->hasMany(VehicleModel::className(), ['vehicle_make_id' => 'id']);
    }
}

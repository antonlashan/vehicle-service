<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%vehicle_model}}".
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property string $model
 * @property integer $no_of_nipples
 *
 * @property Vehicle $vehicle
 */
class VehicleModel extends \yii\db\ActiveRecord
{
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
            [['vehicle_id', 'model'], 'required'],
            [['vehicle_id', 'no_of_nipples'], 'integer'],
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
            'vehicle_id' => 'Make',
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
}

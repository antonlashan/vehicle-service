<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property integer $id
 * @property integer $registration_id
 * @property string $date
 * @property integer $customer_id
 * @property integer $current_meter
 * @property integer $next_service_meter
 * @property integer $next_service
 * @property integer $engine_oil_id
 * @property string $engine_oil
 * @property string $engine_oil_price
 * @property integer $oil_filter_id
 * @property string $oil_filter
 * @property string $oil_filter_price
 * @property integer $diesel_filter_id
 * @property string $diesel_filter
 * @property string $diesel_filter_price
 * @property integer $air_filter_id
 * @property string $air_filter
 * @property string $air_filter_price
 * @property integer $gear_oil_id
 * @property string $gear_oil
 * @property string $gear_oil_price
 * @property integer $differential_oil_id
 * @property string $differential_oil
 * @property string $differential_oil_price
 * @property integer $steering_oil_id
 * @property string $steering_oil
 * @property string $steering_oil_price
 * @property integer $break_oil_id
 * @property string $break_oil
 * @property string $break_oil_price
 * @property integer $coolent_oil_id
 * @property string $coolent_oil
 * @property string $coolent_oil_price
 * @property integer $no_of_grease_nipples
 * @property string $grease_charge
 * @property boolean $full_wash
 * @property string $full_wash_charge
 * @property boolean $body_wash
 * @property string $body_wash_charge
 * @property boolean $vacuume_cleaning
 * @property string $vacuume_cleaning_charge
 * @property boolean $under_wash
 * @property string $under_wash_charge
 * @property boolean $engine_wash
 * @property string $engine_wash_charge
 * @property string $discount
 * @property string $service_charge
 * @property string $remarks
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Customer $customer
 * @property User $createdBy
 * @property User $updatedBy
 * @property Registration $registration
 */
class Service extends ActiveRecord {

    const SERVICE_THRESHOLD = 5000;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registration_id', 'customer_id', 'current_meter', 'next_service_meter', 'next_service', 'engine_oil_id', 'oil_filter_id', 'diesel_filter_id', 'air_filter_id', 'gear_oil_id', 'differential_oil_id', 'steering_oil_id', 'break_oil_id', 'coolent_oil_id', 'no_of_grease_nipples', 'created_by', 'updated_by'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['engine_oil_price', 'oil_filter_price', 'diesel_filter_price', 'air_filter_price', 'gear_oil_price', 'differential_oil_price', 'steering_oil_price', 'break_oil_price', 'coolent_oil_price', 'grease_charge', 'full_wash_charge', 'body_wash_charge', 'vacuume_cleaning_charge', 'under_wash_charge', 'engine_wash_charge', 'discount', 'service_charge'], 'number'],
            [['full_wash', 'body_wash', 'vacuume_cleaning', 'under_wash', 'engine_wash'], 'boolean'],
            [['remarks'], 'string'],
            [['engine_oil', 'oil_filter', 'diesel_filter', 'air_filter', 'gear_oil', 'differential_oil', 'steering_oil', 'break_oil', 'coolent_oil'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['registration_id'], 'exist', 'skipOnError' => true, 'targetClass' => Registration::className(), 'targetAttribute' => ['registration_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_id' => 'Registration ID',
            'date' => 'Date',
            'customer_id' => 'Customer ID',
            'current_meter' => 'Current Meter',
            'next_service_meter' => 'Next Service Meter',
            'next_service' => 'Next Service',
            'engine_oil_id' => 'Engine Oil',
            'engine_oil' => 'Engine Oil',
            'engine_oil_price' => 'Engine Oil Price',
            'oil_filter_id' => 'Oil Filter',
            'oil_filter' => 'Oil Filter',
            'oil_filter_price' => 'Oil Filter Price',
            'diesel_filter_id' => 'Diesel Filter',
            'diesel_filter' => 'Diesel Filter',
            'diesel_filter_price' => 'Diesel Filter Price',
            'air_filter_id' => 'Air Filter',
            'air_filter' => 'Air Filter',
            'air_filter_price' => 'Air Filter Price',
            'gear_oil_id' => 'Gear Oil',
            'gear_oil' => 'Gear Oil',
            'gear_oil_price' => 'Gear Oil Price',
            'differential_oil_id' => 'Differential Oil',
            'differential_oil' => 'Differential Oil',
            'differential_oil_price' => 'Differential Oil Price',
            'steering_oil_id' => 'Steering Oil',
            'steering_oil' => 'Steering Oil',
            'steering_oil_price' => 'Steering Oil Price',
            'break_oil_id' => 'Break Oil',
            'break_oil' => 'Break Oil',
            'break_oil_price' => 'Break Oil Price',
            'coolent_oil_id' => 'Coolent Oil',
            'coolent_oil' => 'Coolent Oil',
            'coolent_oil_price' => 'Coolent Oil Price',
            'no_of_grease_nipples' => 'No Of Grease Nipples',
            'grease_charge' => 'Grease Charge',
            'full_wash' => 'Full Wash',
            'full_wash_charge' => 'Full Wash Charge',
            'body_wash' => 'Body Wash',
            'body_wash_charge' => 'Body Wash Charge',
            'vacuume_cleaning' => 'Vacuume Cleaning',
            'vacuume_cleaning_charge' => 'Vacuume Cleaning Charge',
            'under_wash' => 'Under Wash',
            'under_wash_charge' => 'Under Wash Charge',
            'engine_wash' => 'Engine Wash',
            'engine_wash_charge' => 'Engine Wash Charge',
            'discount' => 'Discount',
            'service_charge' => 'Service Charge',
            'remarks' => 'Remarks',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            BlameableBehavior::className(),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistration()
    {
        return $this->hasOne(Registration::className(), ['id' => 'registration_id']);
    }

    public function getNextServiceLabels()
    {
        $weeks = [];
        for ($w = 7; $w <= 30; $w++) {
            $weeks[$w] = "$w Weeks";
        }

        return $weeks;
    }

    public function getNextServiceLabel()
    {
        return (isset($this->getNextServiceLabels()[$this->next_service]) ? $this->getNextServiceLabels()[$this->next_service] : null);
    }

    public function getDiscountLabels()
    {
        $discounts = [];
        for ($d = 0; $d <= 50; $d = $d + 5) {
            $discounts[$d] = "$d %";
        }

        return $discounts;
    }

    public function getDiscountLabel()
    {
        return (isset($this->getDiscountLabels()[$this->discount]) ? $this->getDiscountLabels()[$this->discount] : null);
    }

}

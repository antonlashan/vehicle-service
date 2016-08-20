<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $type
 * @property string $label
 * @property string $description
 * @property string $price
 */
class Config extends ActiveRecord {

    const TYPE_BODY_WASH = 'BODY_WASH';
    const TYPE_ENGINE_WASH = 'ENGINE_WASH';
    const TYPE_GREASE_PER_NIPPLE = 'GREASE_PER_NIPPLE';
    const TYPE_UNDER_WASH = 'UNDER_WASH';
    const TYPE_VACUUME_CLEANING = 'VACUUME_CLEANING';
    const TYPE_FULL_WASH_CHARGE = 'FULL_WASH_CHARGE';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'price'], 'required'],
            [['price'], 'number'],
            [['type'], 'string', 'max' => 20],
            [['label'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type' => 'Type',
            'label' => 'Label',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }

}

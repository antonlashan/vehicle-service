<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%oil}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $price
 */
class Oil extends ActiveRecord {

    const TYPE_ENGINE = 1;
    const TYPE_BREAK = 2;
    const TYPE_COOLENT = 3;
    const TYPE_POWER = 4;
    const TYPE_GEAR = 5;
    const TYPE_DIFFERENTIAL = 6;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%oil}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'price', 'name'], 'required'],
            [['type'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    public function getTypeLabels()
    {
        return [
            static::TYPE_ENGINE => 'Engine',
            static::TYPE_BREAK => 'Break',
            static::TYPE_COOLENT => 'Coolent',
            static::TYPE_POWER => 'Power',
            static::TYPE_GEAR => 'Gear',
            static::TYPE_DIFFERENTIAL => 'Differential',
        ];
    }

    public function getTypeLabel()
    {
        return isset($this->getTypeLabels()[$this->type]) ? $this->getTypeLabels()[$this->type] : null;
    }

}

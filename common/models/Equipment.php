<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%equipment}}".
 *
 * @property integer $id
 * @property integer $category
 * @property string $name
 * @property string $price
 */
class Equipment extends ActiveRecord {

    const CAT_FILTER_OIL = 1;
    const CAT_FILTER_DIESEL = 2;
    const CAT_FILTER_AIR = 3;
    const CAT_OIL_ENGINE = 4;
    const CAT_OIL_BREAK = 5;
    const CAT_OIL_COOLENT = 6;
    const CAT_OIL_POWER = 7;
    const CAT_OIL_GEAR = 8;
    const CAT_OIL_DIFFERENTIAL = 9;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%equipment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'price'], 'required'],
            [['category'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    public function getCategoryLabels()
    {
        return [
            static::CAT_FILTER_OIL => 'Oil Filter',
            static::CAT_FILTER_DIESEL => 'Diesel Filter',
            static::CAT_FILTER_AIR => 'Air Filter',
            static::CAT_OIL_ENGINE => 'Engine Oil',
            static::CAT_OIL_BREAK => 'Break Oil',
            static::CAT_OIL_COOLENT => 'Coolant Oil',
            static::CAT_OIL_POWER => 'Power Oil',
            static::CAT_OIL_GEAR => 'Gear Oil',
            static::CAT_OIL_DIFFERENTIAL => 'Differential Oil',
        ];
    }

    public function getCategoryLabel()
    {
        return isset($this->getCategoryLabels()[$this->category]) ? $this->getCategoryLabels()[$this->category] : null;
    }

}

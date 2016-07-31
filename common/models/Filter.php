<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%filter}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $price
 */
class Filter extends ActiveRecord {

    const TYPE_OIL = 1;
    const TYPE_DIESEL = 2;
    const TYPE_AIR = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%filter}}';
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
            static::TYPE_OIL => 'Oil',
            static::TYPE_DIESEL => 'Diesel',
            static::TYPE_AIR => 'Air',
        ];
    }

    public function getTypeLabel()
    {
        return isset($this->getTypeLabels()[$this->type]) ? $this->getTypeLabels()[$this->type] : null;
    }

}

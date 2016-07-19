<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $type
 * @property string $label
 * @property string $description
 * @property string $price
 */
class Config extends \yii\db\ActiveRecord
{
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

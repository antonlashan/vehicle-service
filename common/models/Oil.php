<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%oil}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $price
 */
class Oil extends \yii\db\ActiveRecord
{
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
            [['type', 'price'], 'required'],
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
}

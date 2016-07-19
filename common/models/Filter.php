<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%filter}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $price
 */
class Filter extends \yii\db\ActiveRecord
{
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
}

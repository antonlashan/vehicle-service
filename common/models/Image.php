<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property integer $id
 * @property integer $registration_id
 * @property string $name
 *
 * @property Registration $registration
 */
class Image extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registration_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistration()
    {
        return $this->hasOne(Registration::className(), ['id' => 'registration_id']);
    }

    public function getImagePath()
    {
        return $this->registration->getImgUploadPath() . DIRECTORY_SEPARATOR . $this->name;
    }

    public function getImageRelativePath()
    {
        return str_replace(realpath(Yii::$app->basePath . DIRECTORY_SEPARATOR . '..'), '', realpath($this->getImagePath()));
    }

    public function getThumbnail($opt = [])
    {
        $q = '';
        if($opt){
            foreach ($opt as $attr => $val){
                $q .= "&$attr=$val";
            }
        }
        return Url::base() . "/t.php?src={$this->getImageRelativePath()}{$q}";
    }

    public function delete()
    {
        $path = $this->getImagePath();

        if (parent::delete() !== false) {
            if (is_file($path)) {
                unlink($path);
            }
        }
    }

}

<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Image;
use common\models\Registration;

class ImageUploadForm extends Model {

    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload(Registration $registration)
    {
        if ($this->validate()) {

            if (!file_exists($registration->getImgUploadPath())) {
                mkdir($registration->getImgUploadPath(), 0777, true);
            }

            $this->imageFile->saveAs($registration->getImgUploadPath() . DIRECTORY_SEPARATOR . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            
            $image = new Image();
            $image->registration_id = $registration->id;
            $image->name = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $image->save();
            
            return true;
        } else {
            return false;
        }
    }

}

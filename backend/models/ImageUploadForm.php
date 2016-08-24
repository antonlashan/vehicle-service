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
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ['png', 'jpg', 'jpeg']],
        ];
    }

    public function upload(Registration $registration)
    {
        if ($this->validate()) {

            if (!file_exists($registration->getImgUploadPath())) {
                mkdir($registration->getImgUploadPath(), 0777, true);
            }
            
            $baseName = date('YmdHis') . '.' . $this->imageFile->extension;

            $this->imageFile->saveAs($registration->getImgUploadPath() . DIRECTORY_SEPARATOR . $baseName);
            
            $image = new Image();
            $image->registration_id = $registration->id;
            $image->name = $baseName;
            $image->save();
            
            return true;
        } else {
            return false;
        }
    }

}

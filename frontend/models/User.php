<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 25.11.2017
 * Time: 3:15
 */

namespace frontend\models;

use yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class User extends ActiveRecord
{

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload ()
    {
        if ($this->validate()) {
            $this->avatar->savaAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
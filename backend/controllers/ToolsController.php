<?php
namespace backend\controllers;

use Yii;
use backend\models\Upload;
use yii\web\UploadedFile;

class ToolsController extends \yii\web\Controller
{
    /**
     *    文件上传
     *  我们这里上传成功后把图片的地址进行返回
     */
    public function actionUpload ()
    {
        $model = new Upload();
        $uploadSuccessPath = "";
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, "file");
            //文件上传存放的目录
            $dir = "../../public/uploads/".date("Ymd");
            if (!is_dir($dir))
                mkdir($dir);
            if ($model->validate()) {
                //文件名
                $fileName = date("HiiHsHis").$model->file->baseName . "." . $model->file->extension;
                $dir = $dir."/". $fileName;
                $model->file->saveAs($dir);
                $uploadSuccessPath = "/uploads/".date("Ymd")."/".$fileName;
            }
        }
        return $this->render("upload", [
            "model" => $model,
            "uploadSuccessPath" => $uploadSuccessPath,
        ]);
    }
}
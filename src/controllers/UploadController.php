<?php

class UploadController extends CController
{
    public function actionImage()
    {
        if(!Yii::app()->request->isPostRequest)
            throw new CHttpException(400, '');
        try
        {
            $postInput = 'php://input';
            $postData = file_get_contents($postInput);
            if(!(isset($postData) && strlen($postData)>0))
                throw new SiteException();
            $image = new Imagick();
            try
            {
                $image->readimageblob($postData);
            }
            catch(ImagickException $e)
            {
                throw new SiteException('Not a image file.');
            }
            $allowedFormatList = array(
                'BMP' => 'bmp',
                'GIF' => 'gif',
                'JPEG' => 'jpg',
                'PNG' => 'png',
                'SVG' => 'svg',
                'TIFF' => 'tiff',
                'TGA' => 'tga',
            );
            $format = $image->getImageFormat();
            if(!array_key_exists($format, $allowedFormatList))
                throw new SiteException('File format is not supported.');
            $fileName = bin2hex(Rhumsaa\Uuid\Uuid::uuid4()->getBytes()) . '.' . $allowedFormatList[$format];
            $filePath = Yii::app()->params['uploadedImagesDir'] . '/' . $fileName;
            $image->writeimage($filePath);
            $fileUrl = Yii::app()->params['uploadedImagesUrlDir'] . '/' . $fileName;
            $oJsend = Jsend::createSuccess();
            $oJsend->importData(array('url' => $fileUrl));
            JsonResponse::processJson($oJsend);
        }
        catch(SiteException $e)
        {
            $oJsend = Jsend::createError($e->data);
            JsonResponse::processJson($oJsend);
        }
    }
}

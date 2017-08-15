<?php


namespace ailiangkuai\yii2\ueditor\tests;


use yii\base\Action;
use yii\base\InvalidRouteException;
use yii\helpers\Json;
use ailiangkuai\yii2\widgets\webuploader\actions\AttachmentUploaderAction;
use ailiangkuai\yii2\widgets\ueditor\UploadedFile;
use yii\helpers\ArrayHelper;
use ailiangkuai\yii2\widgets\webuploader\actions\ImageUploaderAction;

class UeditorAction extends Action
{
    public $attachmentUrl = 'attachment';
    public $imageUrl = 'image';

    private $_configs;

    public function run($action)
    {
        if (method_exists($this, $action)) {
            return call_user_func_array([$this, $action], $_GET);
        } else {
            throw new InvalidRouteException();
        }
    }

    protected function config()
    {
        return Json::encode($this->loadConfig());
    }

    protected function attach()
    {
        /**
         * @var AttachmentUploaderAction $action
         */
        $action = $this->controller->createAction($this->attachmentUrl);
        $action->attachmentAllowFiles = $this->getConfig('fileAllowFiles');
        $action->attachmentMaxSize = $this->getConfig('fileMaxSize');
        $action->attachmentFieldName = $this->getConfig('fileFieldName');
        $uploadedFile = UploadedFile::getInstanceByName($action->attachmentFieldName);
        $result = Json::decode($action->run());
        $result['state'] = ArrayHelper::remove($result, 'status', '未知错误');
        $result['original'] = $uploadedFile->name;

        return Json::encode($result);
    }

    protected function image()
    {
        /**
         * @var ImageUploaderAction $action
         */
        $action = $this->controller->createAction($this->imageUrl);
        $action->imageAllowFiles = $this->getConfig('imageAllowFiles');
        $action->imageMaxSize = $this->getConfig('imageMaxSize');
        $action->imageFieldName = $this->getConfig('imageFieldName');
        $result = Json::decode($action->run());
        $result['state'] = ArrayHelper::remove($result, 'status', '未知错误');

        return Json::encode($result);
    }

    protected function loadConfig()
    {
        if ($this->_configs === null) {
            $this->_configs = include 'ueditor.config.php';
        }

        return $this->_configs;
    }



//    public function homeworkConfig() {
//        $this->_configs['toolbars'] = [
//            [
//                'bold', 'forecolor', 'link', 'unlink'
//            ],
//        ];
//
//        return Json::encode($this->_configs);
//    }

    protected function getConfig($name)
    {
        return ArrayHelper::getValue($this->loadConfig(), $name, null);
    }
}
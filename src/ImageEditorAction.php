<?php
/**
 * 亿牛集团
 * 本源代码由亿牛集团及其作者共同所有，未经版权持有者的事先书面授权，
 * 不得使用、复制、修改、合并、发布、分发和/或销售本源代码的副本。
 *
 * @copyright Copyright (c) 2017 yiniu.com all rights reserved.
 */


namespace ailiangkuai\yii2\widgets\ueditor;


use Yii;
use yii\base\Action;
use yii\helpers\Json;

class ImageEditorAction extends Action
{
    public function run($field = 'upfile', $type = 'image')
    {
        $field = Yii::$app->getRequest()->post("field", $field);
        $type = Yii::$app->getRequest()->post("type", $type);
        $uploader = Yii::$app->uploader;
        $fileId = null;
        $status = true;
        $uploader->setRules([
            'image'  => [
                'class' => 'yii\validators\ImageValidator'
            ],
            'attach' => [
                'class' => 'yii\validators\Validator'
            ],
            'ajax'   => [
                'class' => 'yii\validators\ImageValidator'
            ]
        ]);
        try {
            $fileId = $uploader->upload($field, $type);
        } catch (\Exception $e) {
            $status = false;
        }
        echo Json::encode([
            'state'    => $status ? 'SUCCESS' : $status,
            'fileId'   => $fileId,
            'url'      => $uploader->getFileUrl($fileId, true),
            'title'    => '',
            'original' => ''
        ]);
    }
}
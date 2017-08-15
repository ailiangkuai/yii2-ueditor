<?php
/**
 * 亿牛集团
 * 本源代码由亿牛集团及其作者共同所有，未经版权持有者的事先书面授权，
 * 不得使用、复制、修改、合并、发布、分发和/或销售本源代码的副本。
 *
 * @copyright Copyright (c) 2017 yiniu.com all rights reserved.
 */


namespace ailiangkuai\yii2\ueditor\tests;


use ailiangkuai\yii2\widgets\webuploader\actions\AttachmentUploaderAction;
use ailiangkuai\yii2\widgets\webuploader\actions\ImageUploaderAction;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return array_merge(parent::actions(), [
            'attachment' => [
                'class' => AttachmentUploaderAction::className(),
            ],
            'image'      => [
                'class' => ImageUploaderAction::className(),
            ],
            'ueditor'    => [
                'class' => UeditorAction::className(),
            ]
        ]);
    }
}
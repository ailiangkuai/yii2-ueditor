<?php

namespace ailiangkuai\yii2\widgets\ueditor;

use yii\web\AssetBundle;

/**
 * Class UEditorAsset
 * @package ailiangkuai\yii2\widgets\ueditor
 */
class UEditorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ailiangkuai/yii2-ueditor/src/assets/dist';
    public $js = [
        'ueditor.config.js',
        YII_DEBUG ? 'ueditor.all.js' : 'ueditor.all.min.js',
    ];
}
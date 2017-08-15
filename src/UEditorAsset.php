<?php

namespace ailiangkuai\yii2\widgets\ueditor;
use yii\web\AssetBundle;

/**
 * Class UEditorAsset
 * @package ailiangkuai\yii2\widgets\ueditor
 */
class UEditorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ailiangkuai/src/assets/dist';
    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];
}
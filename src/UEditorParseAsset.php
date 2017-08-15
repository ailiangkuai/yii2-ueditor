<?php

namespace ailiangkuai\yii2\widgets\ueditor;
use yii\web\AssetBundle;

/**
 * Class UEditorParseAsset
 * @package ailiangkuai\yii2\widgets\ueditor
 */
class UEditorParseAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ailiangkuai/src/assets/dist';
    public $js = [
        'ueditor.parse.min.js',
    ];
}
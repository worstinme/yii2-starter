<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/source';

    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/css/uikit.min.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic',
        'https://use.fontawesome.com/releases/v5.0.9/css/all.css',
        'css/style.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit-icons.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    public function init()
    {
        $this->publishOptions = [
            'forceCopy'=>true,
            'appendTimestamp' => true,
        ];
        parent::init();
    }

}

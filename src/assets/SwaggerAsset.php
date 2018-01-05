<?php
/*
 * This file is part of the wewelove/yii2-swagger-ui.
 *
 * (c) wewelove <wewelove88@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace iamok\swagger\assets;

use yii\web\AssetBundle;

class SwaggerAsset extends AssetBundle
{
    public $sourcePath = '@bower/swagger-ui/dist';
    
    public $js = [
        'swagger-ui-bundle.js',
        'swagger-ui-standalone-preset.js',
    ];
    
    public $css = [
        'swagger-ui.css',
    ];
}

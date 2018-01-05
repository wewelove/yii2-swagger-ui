<?php
/*
 * This file is part of the wewelove/yii2-swagger-ui.
 *
 * (c) wewelove <wewelove88@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace iamok\swagger\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use yii\web\Controller;

class SwaggerController extends Controller
{
    public $layout = false;

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => null,
                    'Access-Control-Max-Age' => 86400
                ]
            ],
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $data  = [
            'name' => $this->module->name,
            'urls' => [],
        ];

        $name  = $this->module->name;
        $items = $this->module->api;

        foreach($items as $version => $item) {
            $data['urls'][] = [
                'name' => $name . ' ' . $version,
                'url' => Url::to(['json', 'version' => $version], true),
            ];
        }

        return $this->render('index', $data);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionJson($version)
    {
        $options     = $this->module->options;
        $basePath    = '';
        $directories = [];

        if (Yii::$app->hasModule($version)) {
            $basePath = Yii::$app->getModule($version)->getBasePath();
            $items = $this->module->api[$version];
            foreach ($items as $tiem) {
                if (is_dir($basePath . '/' . $tiem) || is_file($basePath . '/' . $tiem)) {
                    $directories[] = $basePath . '/' . $tiem;
                }
            }
        } 

        if (empty($directories)) {
            $basePath = Yii::getAlias('@vendor/iamok/yii2-swagger-ui/');
            $directories[] = $basePath . '/example';
        }

        return \Swagger\scan($directories, $options);
    }
}

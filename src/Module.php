<?php

namespace iamok\swagger;

/**
 * swagger module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'iamok\swagger\controllers';

    /**
     * $param string 应用名称
     * @inheritdoc
     */   
    public $name = 'App';

    /**
     * $param array 扫描项目
     * @inheritdoc
     */
    public $api = [];

    /**
     * $param array 扫描配置
     * @inheritdoc
     */
    public $options = [];

    /**
     * $param string 默认控制器
     * @inheritdoc
     */
    public $defaultRoute = 'swagger';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}

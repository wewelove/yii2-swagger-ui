# yii2-swagger-ui

[![version](https://img.shields.io/packagist/v/wewelove/yii2-swagger-ui.svg?style=flat-square)](https://packagist.org/packages/wewelove/yii2-swagger-ui)
[![Download](https://img.shields.io/packagist/dt/wewelove/yii2-swagger-ui.svg?style=flat-square)](https://packagist.org/packages/wewelove/yii2-swagger-ui)
[![Issues](https://img.shields.io/github/issues/wewelove/yii2-swagger-ui.svg?style=flat-square)](https://github.com/wewelove/yii2-swagger-ui/issues)

扩展集成 [swagger-ui](https://swagger.io/swagger-ui/) 和 [swagger-php](https://github.com/zircote/swagger-php)，根据注释自动生成 OpenAPI 文档。

## 安装

推荐使用 [composer](http://getcomposer.org/download/) 安装：

```sh
composer require --prefer-dist iamok/yii2-swagger-ui
```

## 应用

修改项目配置文件 `./config/main.php`，添加 `docs` 项目:

```php
'modules' => [
    'v1' => [
        'class' => 'app\modules\v1\Module',
    ],
    'v2' => [
        'class' => 'app\modules\v2\Module',
    ],
    'docs' => [
        'class' => 'iamok\swagger\Module',
        'name' => 'App',    // 项目名称
        'api' => [
            'v1' => ['swagger', 'controllers', 'models'],   // v1 版本，扫描目录
            'v2' => ['swagger', 'controllers', 'models']    // v2 版本，扫描目录
        ]
    ],
],
```

## 参考

- [swagger](https://swagger.io/)  
- [swagger-php](https://github.com/zircote/swagger-php)  


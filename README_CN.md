[English](./REAME.md) | 简体中文

> 阿里云服务 SDK ，支持 composer 扩展

[![Latest Stable Version](https://poser.pugx.org/axios/aliyun-sdk/v/stable)](https://packagist.org/packages/axios/aliyun-sdk)
[![License](https://poser.pugx.org/axios/aliyun-sdk/license)](https://packagist.org/packages/axios/aliyun-sdk)

> [阿里云官方文档中心](https://help.aliyun.com/)

> QQ 群：521797692

---

## 运行环境
- PHP 7.1+.
- CURL extension.

---

## 安装
```shell
composer require axios/aliyun-sdk-core
```

---

## 使用

  > [aliyun-sdk/example](https://github.com/AxiosCros/aliyun-sdk/tree/master/example)

* 引用 composer 自动加载文件

```php
require_once __DIR__. "/../vendor/autoload.php";
```

* 设置授权信息

```php
$access_id = "testAccessKeyId";
$access_secret = "testAccessKeySecret";

\aliyun\sdk\Aliyun::auth($access_id,$access_secret);
```

* 设置区域

```php
\aliyun\sdk\Aliyun::region('cn-shanghai');
```

* 请求

```php

$response = Vod::V20170321()->GetCategories()
    ->setCateId(-1)
    ->request();
```

* 查看回调结果

```php
dump($response->getContent());
```

---

## 自定义请求


```php

use aliyun\sdk\core\lib\Request;

class Example
{

    protected static $product = "<ProductName>";

    protected static $service_code = "<ProductServiceCode>";

    /**
     * @var string
     * @example \aliyun\sdk\core\credentials\AccessKeyCredential
     * @example AccessKeyCredential
     */
    protected static $credential = "<Credential>";

    protected static $version = "<VersionDate>";

    protected static $endpoints = [
        "regions"  => [],
        "public"   => [],
        "internal" => []
    ];

    /**
     * @param $action
     *
     * @return Request
     */
    public static function client($action = null)
    {
        $request = new Request();
        $request->product(self::$product);
        $request->version(self::$version);
        $request->action($action);
        $request->endpoints(self::$endpoints);
        $request->credential(self::$credential);
        $request->serviceCode(self::$service_code);
        return $request;
    }
}

```

``` php
Aliyun::auth($access_id,$access_secret);
Aliyun::region('cn-hangzhou');

$request = Example::client();

$request->method("POST");

$response = $request->params("key", "value")
    ->headers("header_name", "header_content")
    ->options("guzzle_option_name", "option_value")
    ->request();

$result   = $response->getContent();

```

> [请求选项](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)


## License
licensed under the [MIT License](https://github.com/AxiosCros/aliyun-sdk-core/blob/master/LICENSE)
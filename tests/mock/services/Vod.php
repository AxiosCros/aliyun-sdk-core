<?php

declare(strict_types=1);

namespace aliyun\sdk\tests\mock\services;

use aliyun\sdk\core\lib\ProductAbstract;
use aliyun\sdk\core\traits\ProductTrait;
use aliyun\sdk\services\Vod20170314\V20170314;
use aliyun\sdk\services\Vod20170321\V20170321;
use aliyun\sdk\services\Vod20170420\V20170420;
use aliyun\sdk\services\Vod20170426\V20170426;
use aliyun\sdk\services\Vod20170510\V20170510;
use aliyun\sdk\services\Vod20170713\V20170713;

/**
 * Class VodClient.
 *
 * @method V20170713 V20170713() static
 * @method V20170510 V20170510() static
 * @method V20170426 V20170426() static
 * @method V20170420 V20170420() static
 * @method V20170321 V20170321() static
 * @method V20170314 V20170314() static
 */
class Vod extends ProductAbstract
{
    use ProductTrait;

    protected $product = 'vod';

    protected $service_code = 'vod';

    protected $credential = 'RpcCredential';

    protected $endpoints = [
        'regions'  => [
            'ap-northeast-1',
            'ap-south-1',
            'ap-southeast-1',
            'ap-southeast-2',
            'ap-southeast-3',
            'ap-southeast-5',
            'cn-beijing',
            'cn-chengdu',
            'cn-hangzhou',
            'cn-hongkong',
            'cn-huhehaote',
            'cn-qingdao',
            'cn-shanghai',
            'cn-shenzhen',
            'cn-zhangjiakou',
            'eu-central-1',
            'eu-west-1',
            'me-east-1',
            'us-east-1',
            'us-west-1',
        ],
        'public'   => [
            'ap-northeast-1' => 'vod.aliyuncs.com',
            'ap-south-1'     => 'vod.ap-south-1.aliyuncs.com',
            'ap-southeast-1' => 'vod.aliyuncs.com',
            'ap-southeast-2' => 'vod.aliyuncs.com',
            'ap-southeast-3' => 'vod.aliyuncs.com',
            'ap-southeast-5' => 'vod.aliyuncs.com',
            'cn-beijing'     => 'vod.cn-beijing.aliyuncs.com',
            'cn-chengdu'     => 'vod.aliyuncs.com',
            'cn-hangzhou'    => 'vod.cn-shanghai.aliyuncs.com',
            'cn-hongkong'    => 'vod.aliyuncs.com',
            'cn-huhehaote'   => 'vod.aliyuncs.com',
            'cn-qingdao'     => 'vod.aliyuncs.com',
            'cn-shanghai'    => 'vod.cn-shanghai.aliyuncs.com',
            'cn-shenzhen'    => 'vod.cn-shanghai.aliyuncs.com',
            'cn-zhangjiakou' => 'vod.aliyuncs.com',
            'eu-central-1'   => 'vod.aliyuncs.com',
            'eu-west-1'      => 'vod.aliyuncs.com',
            'me-east-1'      => 'vod.aliyuncs.com',
            'us-east-1'      => 'vod.aliyuncs.com',
            'us-west-1'      => 'vod.aliyuncs.com',
        ],
        'internal' => [
        ],
    ];
}

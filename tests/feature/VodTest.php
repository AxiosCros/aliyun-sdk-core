<?php
/**
 * @author  : axios
 *
 * @email   : axiosleo@foxmail.com
 * @blog    : http://hanxv.cn
 * @datetime: 2019-03-26 17:38
 */

namespace aliyun\sdk\tests\feature;

use aliyun\sdk\Aliyun;
use aliyun\sdk\tests\mock\AccessMock;
use aliyun\sdk\tests\mock\vod\request\GetCategories;
use PHPUnit\Framework\TestCase;

class VodTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Aliyun::auth(AccessMock::getAccessKeyId(), AccessMock::getAccessKeySecret(), "cn-hangzhou");
    }

    public function testGetCategories()
    {
        $request  = new GetCategories();
        $response = $request->request();
        $this->assertArrayHasKey(200, $response->getStatus());
    }
}
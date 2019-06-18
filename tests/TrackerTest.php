<?php

namespace Twodogeggs\Kuaidi100\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Twodogeggs\Kuaidi100\Exceptions\InvalidArgumentException;
use Twodogeggs\Kuaidi100\Tracker;

class TrackerTest extends TestCase
{
    public function testTrackWithEmptyKey()
    {

        $this->expectException(InvalidArgumentException::class);

        // 断言异常信息为 key 不能为空
        $this->expectExceptionMessage('key不能为空');

        new Tracker();

        $this->fail('抛出key不能为空异常');

    }

    public function testTrackWithEmptyCustomer()
    {

        $this->expectException(InvalidArgumentException::class);

        // 断言异常信息为 customer不能为空
        $this->expectExceptionMessage('customer不能为空');

        $kuaidi = new Tracker(['key' => 'key']);
        $kuaidi->track('1', '1');

        $this->fail('抛出customer不能为空异常');
    }

    public function testTrackEmptyCom()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage('物流公司编码不能为空');

        $kuaidi = new Tracker(['key' => 'key', 'customer' => 'customer']);
        $kuaidi->track('', '1');

        $this->fail('抛出物流公司编码不能为空异常');
    }

    public function testTrackEmptyNum()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage('快递单号不能为空');

        $kuaidi = new Tracker(['key' => 'key', 'customer' => 'customer']);
        $kuaidi->track('com', '');

        $this->fail('抛出快递单号不能为空异常');
    }

    
    public function testTrack()
    {

    }
}
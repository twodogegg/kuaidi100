<?php


namespace Twodogeggs\Kuaidi100;


use Twodogeggs\Kuaidi100\Exceptions\HttpException;
use Twodogeggs\Kuaidi100\Exceptions\InvalidArgumentException;

/**
 * 云打印
 * Class CloudPrint
 * @package Twodogeggs\Kuaidi100
 */
class CloudPrint extends Base
{
    /**
     * 云打印订单
     * @param array $param
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function printOrder(array $param)
    {
        $url = 'http://poll.kuaidi100.com/printapi/printtask.do';
        if (empty($param)) {
            throw new InvalidArgumentException('param参数不能为空');
        }

        if (empty($this->options['secret'])) {
            throw new InvalidArgumentException('secret不能为空');
        }

        $t = time();

        $sign = strtoupper(md5(json_encode($param).$t.$this->key.$this->options['secret']));

        $params = [
            'method' => 'printOrder',
            'key' => $this->options['key'],
            'sign' => $sign,
            't' => $t,
            'param' => json_encode($param)
        ];

        try {
            $response = $this->getHttpClient()->request('POST', $url, [
                'form_params' => $params,
            ])->getBody()->getContents();
            return $response;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
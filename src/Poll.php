<?php


namespace Twodogeggs\Kuaidi100;

use Twodogeggs\Kuaidi100\Exceptions\HttpException;
use Twodogeggs\Kuaidi100\Exceptions\InvalidArgumentException;

/**
 * 订阅推送类
 * Class Poll
 * @package Twodogeggs\Kuaidi100
 */
class Poll extends Base
{
    /**
     * 取得推送
     * @param string $company
     * @param string $number
     * @param string $callbackUrl
     * @param string $schema
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPoll(string $company, string $number, string $callbackUrl, string $schema = 'json')
    {
        $url = 'https://poll.kuaidi100.com/poll';

        if (empty($company)) {
            throw new InvalidArgumentException('公司编号不能为空');
        }

        if (empty($number)) {
            throw new InvalidArgumentException('物流编号不能为空');
        }

        if (empty($callbackUrl)) {
            throw new InvalidArgumentException('回调地址不能为空');
        }

        $params= [
            'schema' => $schema,
            'param' => json_encode([
                'company' => $company,
                'number' => $number,
                'key' => $this->options['key'],
                'parameters' => [
                    'callbackurl' => $callbackUrl
                ]
            ])
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

    /**
     * 取得推送，自己传入 $param参数
     * @param array $param
     * @param string $schema
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPollByParam(array $param, string $schema = 'json')
    {
        $url = 'https://poll.kuaidi100.com/poll';
        if (empty($param)) {
            throw new InvalidArgumentException('param参数不能为空');
        }
        $params= [
            'schema' => $schema,
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
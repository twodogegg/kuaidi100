<?php


namespace Twodogeggs\Kuaidi100;


use GuzzleHttp\Client;
use Twodogeggs\Kuaidi100\Exceptions\InvalidArgumentException;

/**
 * 基础类
 * Class Base
 * @package Twodogeggs\Kuaidi100
 */
class Base
{
    /**
     * @var mixed
     */
    protected $key;
    /**
     * @var array
     */
    protected $guzzleOptions = [];
    /**
     * @var array
     */
    protected $options = [
        'customer' => '',
        'key' => ''
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Base constructor.
     * @param array $options
     * @throws InvalidArgumentException
     */
    public function __construct($options = [])
    {
        if (empty($options['key'])) {
            throw new InvalidArgumentException('key不能为空');
        }

        $this->options = array_merge($this->options, $options);

        $this->key = $this->options['key'];
    }

    /**
     * @return Client
     */
    protected function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    /**
     * @param array $options
     */
    protected function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

}
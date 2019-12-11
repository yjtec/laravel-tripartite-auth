<?php
namespace Yjtec\LaravelTripartiteAuth\Providers;

use Yjtec\LaravelTripartiteAuth\Exception;

class ServiceProvider extends Exception
{
    public $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getConfigFirld($firld)
    {
        return $this->config[$firld];
    }

    protected function parseAccessToken($body)
    {
        if (!is_array($body)) {
            $body = json_decode($body, true);
        }

        if (empty($body['access_token'])) {
            self::setMessage('Authorize Failed: '.json_encode($body, JSON_UNESCAPED_UNICODE));
        }

        return $body;
    }
    protected function arrayItem(array $array, $key, $default = null)
    {
        if (is_null($key)) {
            return $array;
        }

        if (isset($array[$key])) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return $default;
            }

            $array = $array[$segment];
        }

        return $array;
    }

    public function getImplodeKeyByValue($data, $separator = '&')
    {
        $str = null;
        foreach ($data as $key => $value) {
            $str .= "{$key}={$value}{$separator}";
        }
        return $str;
    }
}
<?php


namespace Yjtec\LaravelTripartiteAuth;


class TripartiteAuth extends Exception
{
    public $config_name = 'tripartite_auth';

    public function __call($name, $arguments)
    {
        $config = $this->getConfig($name, $arguments);
        return self::make($name, $config);
    }

    public static function make($name, array $config)
    {
        $application = "\\Yjtec\\LaravelTripartiteAuth\\Providers\\{$name}";
        return new $application($config);
    }

    /**
     * 查询配置
     * @param $name [默认配置]
     * @param $config [指定配置]
     * @return \Illuminate\Config\Repository|mixed
     * @throws \Exception
     */
    public function getConfig($name, $config)
    {
        $config = empty($config) ? config("tripartite_auth.{$name}") : config("tripartite_auth.{$config[0]}");
        if (!$config) {
            self::setMessage('没有查询到配置文件');
        }
        return $config;
    }
}
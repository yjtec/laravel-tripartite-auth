<?php
namespace Yjtec\LaravelTripartiteAuth\Providers;

use Yjtec\Support\Curl;

/**
 * 微信开放平台APP授权
 * Class WeChatOpenPlatform
 * @package Yjtec\LaravelTripartiteAuth\Providers
 */
class WeChatOpenPlatform extends ServiceProvider
{
    /**
     * The base url of WeChat API.
     *
     * @var string
     */
    protected $baseUrl = 'https://api.weixin.qq.com/sns';

    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    /**
     * 根据code获取Token
     * @param $code
     * @return mixed
     */
    public function getAccessToken($code)
    {
        $response = Curl::get(
            $this->getTokenUrl() . '?' . $this->getTokenFields($code, true),
            [],
            ['Accept:application/json']
        );
        return $this->parseAccessToken($response);
    }

    /**
     * 根据Token获取用户信息
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public function getUserByToken($token)
    {
        $scopes = explode(',', $token['scope']);

        if (in_array('snsapi_base', $scopes)) {
            self::setMessage("openid of AccessToken is required.");
        }

        if (empty($token['openid']) || empty($token['access_token'])) {
            self::setMessage("缺少参数 openid 或 AccessToken");
        }
        $path_data = [
            'access_token' => $token['access_token'],
            'openid' => $token['openid'],
        ];
        $response = Curl::get(
            $this->baseUrl . "/userinfo?" . $this->getImplodeKeyByValue($path_data)
        );
        return json_decode($response, true);
    }

    protected function getTokenUrl()
    {
        return $this->baseUrl . '/oauth2/access_token';
    }

    /**
     * {@inheritdoc}.
     */
    protected function getTokenFields($code, $str = false)
    {
        $data = array_filter([
            'appid' => $this->getConfigFirld('app_id'),
            'secret' => $this->getConfigFirld('secret'),
            'code' => $code,
            'grant_type' => 'authorization_code',
        ]);

        return $str ? $this->getImplodeKeyByValue($data) : $data;
    }

}
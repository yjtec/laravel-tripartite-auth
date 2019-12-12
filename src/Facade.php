<?php


namespace Yjtec\LaravelTripartiteAuth;

use \Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Class Facade
 * @package LaravelTripartiteAuth
 * @method static \Yjtec\LaravelTripartiteAuth\Providers\WeChatOpenPlatform WeChatOpenPlatform(array $config = [])
 */
class Facade extends LaravelFacade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TripartiteAuth';
    }
}
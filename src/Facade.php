<?php


namespace Yjtec\LaravelTripartiteAuth;

use \Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Class Facade
 * @package LaravelTripartiteAuth
 * @see \Yjtec\LaravelTripartiteAuth\TripartiteAuth
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
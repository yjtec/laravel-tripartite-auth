<?php


namespace Yjtec\LaravelTripartiteAuth;

class Exception
{
    public static function setMessage($message)
    {
        throw new \Exception($message, -1);
    }

    public static function setRuntimeMessage()
    {
        throw new \RuntimeException();
    }
}
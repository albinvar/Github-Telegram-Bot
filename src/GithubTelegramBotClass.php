<?php

namespace Albinvar\GithubTelegramBot;
;

class GithubTelegramBotClass
{
    public function __construct()
    {
        static::boot();
    }

    static public function boot()
    {
        var_dump(getConfigs());
    }

    public static function call()
    {
        return static::$configs;
    }
}

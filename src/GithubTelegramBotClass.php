<?php

namespace Albinvar\GithubTelegramBot;

class GithubTelegramBotClass
{
    /**
     * @var mixed
     */
    public static mixed $config;

    public function __construct()
    {
        static::boot();
    }

    static public function boot()
    {
        self::setConfig();
        static::$config = static::getConfig();
    }

    /**
     * @return mixed
     */
    public static function getConfig(): mixed
    {
        return getConfigs();
    }

    /**
     * @param mixed $config
     */
    public static function setConfig(mixed $config): void
    {
        setConfigs();
    }

}

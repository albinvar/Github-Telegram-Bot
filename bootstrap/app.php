<?php

require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;

//error_reporting(E_ALL);
//error_reporting(-1);
//ini_set('error_reporting', E_ALL);

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->safeLoad();


function getConfigs()
{
   return include(__DIR__ . '/../config/bot.php');
}

function setConfigs()
{
    $config = getConfigs();
    define('BOT_API_TOKEN', $config['BOT_API_TOKEN']);
    define('BOT_USERNAME', $config['BOT_USERNAME']);
    define('WEBHOOK_URL', $config['WEBHOOK_URL']);
}


date_default_timezone_set($_ENV['TIMEZONE'] ?? 'Asia/Kolkata');



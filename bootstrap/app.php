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


date_default_timezone_set($_ENV['TIMEZONE']);



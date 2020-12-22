<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/functions.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

date_default_timezone_set('Asia/Kolkata');

if (empty(getenv('API_TOKEN'))){
$api = "YOUR_API_TOKEN";
} else {
$api = getenv('BOT_TOKEN');
}

if (empty(getenv('ADMINS'))) {
$admin = "ADMIN_IDS_SEPERATED_BY_COMMA";
} else {
$admin = getenv('ADMINS');
}
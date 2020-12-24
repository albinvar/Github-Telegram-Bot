<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/functions.php';

date_default_timezone_set('Asia/Kolkata');

if (empty(getenv('BOT_TOKEN'))){
$api = "YOUR_API_TOKEN";
} else {
$api = getenv('BOT_TOKEN');
}

if (empty(getenv('ADMINS'))) {
$admin = "ADMIN_IDS_SEPERATED_BY_SPACE";
} else {
$admin = getenv('ADMINS');
}
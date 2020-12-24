<?php

require __DIR__.'/config/config.php';

$link = "https://{$_SERVER['SERVER_NAME']}";
$method_url = "https://api.telegram.org/bot{$api}/setWebhook";
$url = $method_url.'?url='.$link;
$response = @file_get_contents($url);

var_dump($response);
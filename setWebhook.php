<?php
	require __DIR__.'/config/config.php';
	
	$link= "https://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}";
	$botApi = $api;
	
	
    $method_url = 'https://api.telegram.org/bot' . $botApi . '/setWebhook';
    $url = $method_url . '?url=' . $link;
    $response = @file_get_contents($url);
    var_dump($url);
    var_dump($response);
<?php
	require __DIR__.'/config/config.php';
	
	$link= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	//$link = $_GET['link'];
	$botApi = getenv('API_TOKEN');
	
	
    $method_url = 'https://api.telegram.org/bot' . $botApi . '/setWebhook';
    $url = $method_url . '?url=' . $link;
    $response = @file_get_contents($url);
   
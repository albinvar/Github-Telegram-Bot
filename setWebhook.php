<?php
	require __DIR__.'/config/config.php';
	
	$link = $_GET['link'];
	$botApi = getApi();
	
	$text = str_replace("\n", "%0A", $text);
    $method_url = 'https://api.telegram.org/bot' . $botApi . '/setWebhook';
    $url = $method_url . '?url=' . $link;
    $response = @file_get_contents($url);
    var_dump($response);
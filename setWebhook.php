<?php
	require __DIR__.'/../config/bootstrap.php';
	
	$link = $_GET['link'];
	
	$text = str_replace("\n", "%0A", $text);
    $method_url = 'https://api.telegram.org/bot' . $botApi . '/setWebhook';
    $url = $method_url . '?url=' . $link;
    $response = @file_get_contents($url);
    var_dump($response);
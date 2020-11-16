<?php
use App\GitHubBot;

require __DIR__.'/config/config.php';

$api = getApi();
$chatId = "1145842752";

$object = new GitHubBot($api, $chatId);
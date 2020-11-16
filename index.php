<?php
use App\GitHubBot;

require __DIR__.'/../config/bootstrap.php';

$botApi = getApi();
$chatId = "1145842752";

$object = new GitHubBot($api, $chatId);

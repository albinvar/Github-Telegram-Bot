<?php
use App\GitHubBot;

require __DIR__.'/config/config.php';

$api = getApi();
$admchatId = "1145842752";

$object = new GitHubBot($api);
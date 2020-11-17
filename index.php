<?php
use App\GitHubBot;

require __DIR__.'/config/config.php';

$api = $_ENV['BOT_API'];
$admin = $_ENV['ADM_CHATID'];

$object = new GitHubBot($api, $admin);
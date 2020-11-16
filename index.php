<?php
use App\GitHubBot;

require __DIR__.'/config/config.php';

$api = getApi();
$admchatId = "1145842752";

$data = json_decode(file_get_contents("php://input"));
$chatId = $data->message->chat->id;

$object = new GitHubBot($api, $chatId);
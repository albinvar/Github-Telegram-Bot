<?php

use Albinvar\GithubTelegramBot\GithubTelegramBotClass;

require_once __DIR__.'/bootstrap/app.php';

$class = new GithubTelegramBotClass();

var_dump($class->call());

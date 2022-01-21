<?php

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

require_once __DIR__.'/../bootstrap/app.php';

//set all configs
setConfigs();

try {
    // Create Telegram API object
    $telegram = new Telegram(BOT_API_TOKEN, BOT_USERNAME);

    // Set webhook
    $result = $telegram->setWebhook(WEBHOOK_URL);


    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}

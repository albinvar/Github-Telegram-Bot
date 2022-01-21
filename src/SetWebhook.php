<?php

require_once __DIR__.'/../bootstrap/app.php';

setConfigs();

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram(BOT_API_TOKEN, BOT_USERNAME);

    // Set webhook
    $result = $telegram->setWebhook(WEBHOOK_URL);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}

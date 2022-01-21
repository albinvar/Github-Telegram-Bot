<?php

/*
 * Configure your application here.
 *
 *
 *
 */

return  [
    /*
     * Set your bot api token key here.
     *
     */
    'BOT_API_TOKEN' => $_ENV['BOT_API_TOKEN'] ?: "YOUR_TELEGRAM_BOT_API_KEY",

    /*
     * Set your bot username here.
     */
    'BOT_USERNAME' => $_ENV['BOT_USERNAME'] ?: "YOUR_TELEGRAM_BOT_API_KEY",

    /*
     * ADMINS key expects a single or an array of telegram user ids to push
     * notifications from a single repositories.
     *
     */
    'ADMINS' => $_ENV['ADMINS'] ? 3 : ['ADMIN_1', 'ADMIN_2'],

];

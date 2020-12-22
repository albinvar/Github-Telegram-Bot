<?php
use App\GitHubBot;

require __DIR__.'/config/config.php';


$object = new GitHubBot($api, $admin);
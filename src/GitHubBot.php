<?php

namespace App;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class GitHubBot
{
    private $api;
    private $chatId;
    private $payload;
    private $message;
    private $request;
    
    public function __construct($api, $chatId)
    {
        $this->request = Request::createFromGlobals();
        $this->api = $api;
        $this->chatId = $chatId;
    }
    
    public function getPayload()
    {
        $this->payload = json_decode($this->request->request->get('payload'));
        
    }
    
}
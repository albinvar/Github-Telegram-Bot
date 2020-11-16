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
    
    private function setMessage($typeEvent)
    {
        switch($typeEvent) {
            case 'pushEvent':
                $this->message .= "Commits:\n";
                foreach ($this->payload->commits as $commit) {
                    $commitId = substr($commit->id, -7);
                    $this->message .= "- by {$commit->author->name} with message: {$commit->message} ({$commitId}) \n";
                }
                $this->message .= "Pushed by : <b>{$this->payload->pusher->name}</b>\n";
                break;
            default:
                $this->message .= "$typeEvent";
        }
    }
    
}
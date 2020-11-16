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
        $this->sendMessage();
    }

    public function getPayload()
    {
        $this->payload = json_decode($this->request->request->get('payload'));
        $this->setMessage($this->request->server->get('HTTP_X_GITHUB_EVENT'));
    }

    private function setMessage($typeEvent)
    {
        switch($typeEvent) {
            case 'push':
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

    public function sendMessage()
    {
        $this->getPayload();
        $text = str_replace("\n", "%0A", $this->message);
        $method_url = 'https://api.telegram.org/bot'.$this->api.'/sendMessage';
        $url = $method_url.'?chat_id='.$this->chatId.'&disable_web_page_preview=1&parse_mode=html&text='.$text;
        $client = new Client();
        $response = $client->request('GET', $url);
        if($response->getStatusCode() == 200) {
            return true;
        }
        return false;
    }

}
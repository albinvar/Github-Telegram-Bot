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
        $this->telegram = new \Telegram($api);
        $this->result = $this->telegram->getData();
        $this->api = $api;
        $this->getChatId();
        if (empty($this->chatId)) {
        $this->admId = $chatId;
        $this->sendMessage();
        } else {
        $this->sendTelegram($this->text);
        }
    }
    
    public function getChatId()
    {
    	$this->text = $this->result['message'] ['text'];
		$this->chatId = $this->result['message'] ['chat']['id'];
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
	            $count = count($this->payload->commits);
				$noun =  ($count > 1) ? "commits" : "commit"; 
                $this->message .= "⚙️ <b>{$count}</b> new {$noun} to <b>{$this->payload->repository->name}:{$this->payload->repository->default_branch}</b>\n\n";
                foreach ($this->payload->commits as $commit) {
                    $commitId = substr($commit->id, -7);
                    $this->message .= "<a href=\"{$commit->url}\">{$commitId}</a>: {$commit->message} by <i>{$commit->author->name}</i>\n";
                }
                $this->message .= "\nPushed by : <b>{$this->payload->pusher->name}</b>\n";
                break;
			case 'ping':
                $this->message .= "♻️ <b>Connection Successfull</b>\n\n";
                break;
            case 'issues':
	            if ($this->payload->action == "opened") {
	            $this->message .= "⚠️ <b>New Issue</b> - <a href=\"{$this->payload->issue->html_url}\">{$this->payload->repository->full_name}#{$this->payload->issue->number}</a>\n\n";
	            $this->message .= "<a href=\"{$this->payload->issue->html_url}\">{$this->payload->issue->title}</a> by <a href=\"{$this->payload->issue->user->html_url}\">@{$this->payload->issue->user->login}</a>\n\n";
	            $this->message .= " {$this->payload->issue->body}";
				} elseif ($this->payload->action == "closed") {
				$this->message .= "🚫 <b>Issue Closed </b> - <a href=\"{$this->payload->issue->html_url}\">{$this->payload->repository->full_name}#{$this->payload->issue->number}</a>\n\n";
	            $this->message .= "<a href=\"{$this->payload->issue->html_url}\">{$this->payload->issue->title}</a> by <a href=\"{$this->payload->issue->user->html_url}\">@{$this->payload->issue->user->login}</a>\n\n";
	            $this->message .= " {$this->payload->issue->body}";
				}
	            break;
			case 'issue_comment':
                $this->message .= "📬 <b>New comment </b> on <a href=\"{$this->payload->comment->url}\">{$this->payload->repository->full_name}#{$this->payload->issue->number}</a>\n\n";
	            $this->message .= "<a href=\"{$this->payload->comment->html_url}\">comment</a> by <a href=\"{$this->payload->comment->user->html_url}\">@{$this->payload->comment->user->login}</a>\n\n";
	            $this->message .= " {$this->payload->comment->body}";
                break;
            case 'pull_request':
	            if ($this->payload->action == "opened") {
	            $this->message .= "👷‍♂️🛠️ <b>New Pull Request</b> - <a href=\"{$this->payload->pull_request->html_url}\">{$this->payload->repository->full_name}#{$this->payload->pull_request->number}</a>\n\n";
	            $this->message .= "<a href=\"{$this->payload->pull_request->url}\">{$this->payload->pull_request->title}</a> by <a href=\"{$this->payload->pull_request->user->html_url}\">@{$this->payload->pull_request->user->login}</a>\n\n";
	            $this->message .= " {$this->payload->pull_request->body}";
				} elseif ($this->payload->action == "closed") {
				$this->message .= "✅ <b>Pull Request Merged </b> - <a href=\"{$this->payload->pull_request->html_url}\">{$this->payload->repository->full_name}#{$this->payload->pull_request->number}</a>\n\n";
	            $this->message .= "<a href=\"{$this->payload->pull_request->html_url}\">{$this->payload->pull_request->title}</a> by <a href=\"{$this->payload->pull_request->user->html_url}\">@{$this->payload->pull_request->user->login}</a>\n\n";
	            $this->message .= " {$this->payload->pull_request->body}";
				}
	            break;
			case 'issue_comment':
                $this->message .= "📬 <b>New comment </b> on <a href=\"{$this->payload->comment->html_url}\">{$this->payload->repository->full_name}#{$this->payload->issue->number}</a>\n\n";
	            $this->message .= "<a href=\"{$this->payload->comment->html_url}\">comment</a> by <a href=\"{$this->payload->comment->user->html_url}\">@{$this->payload->comment->user->login}</a>\n\n";
	            $this->message .= " {$this->payload->comment->body}";
                break;
        }
    }
    
    public function charReplace()
    {
    	$this->chars = ["\n"];
	    $this->ascii = ["%0A"];
		return str_replace($this->chars, $this->ascii, urlencode($this->message));
    }

    public function sendMessage()
    {
        $this->getPayload();
        $text = $this->charReplace();
        $method_url = 'https://api.telegram.org/bot'.$this->api.'/sendMessage';
        $url = $method_url.'?chat_id='.$this->admId.'&disable_web_page_preview=1&parse_mode=html&text='.$text;
        $client = new Client();
        $response = $client->request('GET', $url);
        if($response->getStatusCode() == 200) {
            return true;
        }
        return false;
    }
    
    public function sendTelegram($text)
    {
    	switch($text) {
            case '/start':
        $reply = "<b>🙋🏻 Github Notify Bot 🤓</b>
        
I can send you notifications from your github Repository instantly to your Telegram. use /help for more information about me.

		";
		$content = array('chat_id' => $this->chatId, 'text' => $reply, 'disable_web_page_preview' => true, 'parse_mode' => "HTML");
		$this->telegram->sendMessage($content);
		break;
			case '/help':
		$reply = "<b>Available Commands </b>

/id - To get chat id
/host - To get Host Address
/help - To show this Message

Select a command :";
		$content = array('chat_id' => $this->chatId, 'text' => $reply, 'disable_web_page_preview' => true, 'parse_mode' => "HTML");
		$this->telegram->sendMessage($content);
		break;
			case '/id':
		$reply = "Your id is <code>{$this->chatId}</code>";
		$content = array('chat_id' => $this->chatId, 'text' => $reply, 'disable_web_page_preview' => true, 'parse_mode' => "HTML");
		$this->telegram->sendMessage($content);
		break;
			case '/host':
		$reply = "Server Address : <a href=\"{$_SERVER['REMOTE_ADDR']}\">{$_SERVER['REMOTE_ADDR']}</a>";
		$content = array('chat_id' => $this->chatId, 'text' => $reply,  'disable_web_page_preview' => true, 'parse_mode' => "HTML");
		$this->telegram->sendMessage($content);
		break;
		
		default:
		$reply = "Invalid Request";
		$content = array('chat_id' => $this->chatId, 'text' => $reply);
		$this->telegram->sendMessage($content);
		
		}
    }

}
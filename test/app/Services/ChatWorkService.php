<?php

namespace App\Services;

use GuzzleHttp\Client;

class ChatWorkService
{
    private $body = "";
    private $client;
    private $token;
    private $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = config('chat_work.chat_work_token');
        $room_id = config('chat_work.chat_work_room_id');
        $this->url = "https://api.chatwork.com/v2/rooms/{$room_id}/messages";
    }

    public function addMessage($message)
    {
        $this->body .= $message . "\n";
    }

    public function sendMessage()
    {
        try {
            $this->client->post($this->url, [
                'headers'     => ['X-ChatWorkToken' => $this->token],
                'form_params' => ['body' => $this->body]
            ]);
            $this->body = "";
        } catch (\Throwable $e) {
            info($e->getMessage());
        }
    }
}
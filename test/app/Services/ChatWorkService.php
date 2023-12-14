<?php

namespace App\Services;

use GuzzleHttp\Client;

class ChatWorkService
{
    private $client;
    private $body;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function addMessage($body)
    {
        $token   = config('chat_work.chat_work_token');
        $room_id = config('chat_work.chat_work_room_id');
        $url     = "https://api.chatwork.com/v2/rooms/{$room_id}/messages";
        $this->body = $body;

        return $this->sendMessage($url, $token);
    }

    public function sendMessage($url, $token)
    {
        try {
            $response = $this->client->post($url, [
                'headers'     => ['X-ChatWorkToken' => $token],
                'form_params' => ['body' => $this->body]
            ]);
            return $response;
        } catch (\Throwable $e) {
            info($e->getMessage());
            return null;
        }
    }
}
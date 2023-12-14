<?php

namespace App\Services;

use GuzzleHttp\Client;

class ChatWorkService
{
    public function create_chat_work_message_post($body)
    {
        try {
            $client = new Client();
            $token   = config('chat_work.chat_work_token');
            $room_id = config('chat_work.chat_work_room_id');
            // webhookURL
            $url     = "https://api.chatwork.com/v2/rooms/{$room_id}/messages";

            $response = $client->post($url, [
                'headers'     => ['X-ChatWorkToken' => $token],
                'form_params' => ['body' => $body]
            ]);
            return $response;
        } catch (\Throwable $e) {
            info($e->getMessage());
        }
    }
}
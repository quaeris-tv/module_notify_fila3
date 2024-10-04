<?php

declare(strict_types=1);

namespace Modules\Notify\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramNotificationController extends Controller
{
    /**
     * Store Telegram Chat ID from telegram webhook message.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $messageText = $request->message['text'];

            if ('/start' == $messageText) {
                // SAVE
                $chatId = $request->message['chat']['id'];
                $username = $request->message['chat']['username'];

                return;
            }

            if ('/stop' == $messageText) {
                // CLEAN
                $username = $request->message['chat']['username'];

                return;
            }

            Telegram::sendMessage([
                'chat_id' => $request->message['chat']['id'],
                'text' => 'Echo '.$messageText,
            ]);

            $response = $telegram->sendMessage([
                'chat_id' => 'CHAT_ID',
                'text' => 'Hello World',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => $e->getCode(),
                'message' => 'Accepted with error: \''.$e->getMessage().'\'',
            ], 202);
        }

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/webhook.log'),
        ])->info($request->all());

        return response('Success', 200);
    }

    public function view(Request $request)
    {
        return response('Success', 200);
    }
}

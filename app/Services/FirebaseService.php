<?php

namespace App\Services;

use App\Models\FcmJob;
use App\Models\FcmMessage;
use Illuminate\Support\Facades\Log;

class FirebaseService
{
    /**
     * $data 傳目先定義為 string
     * TODO: 後續加上 data 傳入資料檢查及驗證
     * @param string $data
     *
     * @return array
     */
    public function sendCloudMessage(string $data)
    {
        $data = json_decode($data, true);
        $response = [
            'identifier'   =>  $data['identifier'],
            'deliver_at'    =>  now()
        ];
        try {
            $messaging = app('firebase.messaging');
            $sendMessage = [
                'message' => [
                    'notification'  => [
                        'title' =>  'Incoming message',
                        'body'  =>  $data['text'],
                    ]
                ]
            ];
            $messaging->sendMulticast($sendMessage, $data['deviceId'] ? [$data['deviceId']] : []);
            // TODO: Remove for prod
            Log::info("fcm message send", $response);

        } catch (\Exception $e) {
            Log::error(__CLASS__ . "::" . __FUNCTION__ ."::". __LINE__, ['exception' => $e]);
        }

        $this->saveFcmJob($response);
        return $response;
    }

    /**
     * 儲存 response
     * @param $response
     *
     * @return bool
     */
    private function saveFcmJob($response)
    {
        FcmJob::create($response);
        return true;
    }
}

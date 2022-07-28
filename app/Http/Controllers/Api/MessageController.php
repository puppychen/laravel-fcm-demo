<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FirebaseService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * 傳送訊息
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        //$data = '{"identifier": "fcm-msg-a1beff5ac", "type": "device", "deviceId": "string", "text":"Notification message"}';
        $data = json_encode([
                                'identifier'    =>  $request->identifier,
                                'type'          =>  $request->type,
                                'deviceId'      =>  $request->deviceId,
                                'text'          =>  $request->text
                            ]);
        $firebase = app(FirebaseService::class);
        $response = $firebase->sendCloudMessage($data);

        return response()->json([
            'notification' => ['done'=> $response]
            ]);
    }

}

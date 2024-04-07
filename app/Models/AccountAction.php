<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class AccountAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cAccName',
        'count',
        'status',
        'action',
    ];

    public static function sendMessageToTelegram($message){
        $token = "6351735984:AAGQtpXHx9ZGqQHYTOOnHfMpMBE2oQaeRv4";
        $url = "https://api.telegram.org/bot".$token."/sendMessage";
        $options = ['verify'=>false];
        $response = Http::withOptions($options)->post($url, [
            'chat_id' => '@volamkysu',
            'text' => $message,
        ]);
    }

    public static function createOrUpdate($logAccHabitus){
        if ($logAccHabitus) {
            $currentWarningAcc = AccountAction::where('cAccName', $logAccHabitus->cAccName)->first();
            if (is_null($currentWarningAcc)) {
               $currentWarningAcc = new AccountAction([
                    'cAccName' => $logAccHabitus->cAccName,
                    'count' => 1,
                    'status' => 1,
                    'action' => 0,
               ]);
               $currentWarningAcc->save();
            }else{
                $currentWarningAcc->count = (int) $currentWarningAcc->count + 1;
                $currentWarningAcc->status = 1;
                $currentWarningAcc->action = 0;
                $currentWarningAcc->update();
            }
        }
    }

}

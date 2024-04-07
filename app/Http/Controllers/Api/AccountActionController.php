<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountAction;
use App\Models\LogAccountHabitus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'All User';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *  1: playerinder
     *  2: cAccname
     *  3: GameName
     *  4: Coin - Expoint
     *  5: IP Address
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $data = $request->all();
        $logtime = date('Y-m-d H:i:s');
        $all_habits = json_decode($data['data'], true);
        $listBlackAccount = [];
        foreach ($all_habits as $habit) {
            $cAccName = trim($habit[1]);
            $coin = (int) trim($habit[3]);
            $gamename = trim($habit[2]);
            $coinchange = $coin;
            $ip = trim($habit[4]);
            if ($cAccName) {
                // check có thay đổi xu và xu bị âm thì cho vào blacklist
                $currentHabit = LogAccountHabitus::where('cAccName', $cAccName)->orderBy('created_at', 'desc')->first();
                if ($currentHabit) {
                    $coinchange = $coin - $currentHabit->coin;
                    if ($currentHabit->coin >= 0 && $coin < 0) {
                        $blackAcc = [
                            "cAccName" => $cAccName,
                            'gamename' => $gamename,
                            'coin'  => $coin,
                            'coinchange' => $coinchange,
                            "ip" => $ip,
                        ];
                        $listBlackAccount[] = $blackAcc;
                    }
                }
            }
            if ($coinchange != 0) {
                $dataCreateLogHabits = [
                    "playerindex" => trim($habit[0]),
                    "cAccName" => $cAccName,
                    "gamename" => $gamename,
                    "coin" => $coin,
                    "coinchange" => $coinchange,
                    "ip" => $ip,
                    "logtime" => $logtime
                ];
                LogAccountHabitus::create($dataCreateLogHabits);
            }
        }

        // check black list Acc
        // lấy ra list + tài khoản, kiểm tra
        // cùng ip và change > 1000 hoặc thay đổi bằng tài khoản bị âm
        foreach ($listBlackAccount as $acc) {
            $listLogWarningAcc = LogAccountHabitus::where('logtime', $logtime)
                                    ->where(function($query) use ($acc){
                                        $query->where('coinchange', abs($acc['coinchange']))
                                        ->orWhere(function($query) use ($acc){
                                            $query->where('ip', $acc['ip'])
                                                ->where('coinchange', '>=', 1000);
                                        });
                                    })
                                    ->orderBy('created_at', 'desc')
                                    ->get();

            if ($listLogWarningAcc->count() > 0) {
                foreach ($listLogWarningAcc as $warningAcc) {
                    AccountAction::createOrUpdate($warningAcc); 
                }
            }

        }

        // goi thong bao den telegram
        $listWarningAcc = AccountAction::where('status', '1')
                        ->where('action', '0')
                        ->get();
        // $message = "";
        if ($listWarningAcc->count() > 0) {
            $message = 'Danh sách người chơi có khả năng bug xu:';
            $i = 0;
            foreach ($listWarningAcc as $acc) {
                $i++;
                $logAcc = LogAccountHabitus::where('cAccName', $acc->cAccName)->orderBy('created_at', 'desc')->first();
                // send to telegram
                $message = $message . PHP_EOL.$i.'. Id: ' . $acc->cAccName . ' | NV: ' . $logAcc->gamename . ' | ip: ' . $logAcc->ip . PHP_EOL . ' | Biến động: ' . $logAcc->coinchange . " | Hiện có: " .$logAcc->coin;
                // update action
                $acc->action = $acc->action+1;
                $acc->update();
            }
            // dd($message);
            AccountAction::sendMessageToTelegram($message);
        }

       
        if (count($listBlackAccount) > 0) {
            $message = 'Danh sách người chơi bị âm xu';
            $i = 0;
            foreach ($listBlackAccount as $acc) {
                $i++;
                $message = $message . PHP_EOL.$i.'. Id: ' . $acc['cAccName'] . ' | NV: ' . $acc['gamename'] . ' | ip: ' . $logAcc->ip . PHP_EOL . ' | Biến động: ' . $acc['coinchange']. " | Hiện có: " .$acc['coin'];
            }
            AccountAction::sendMessageToTelegram($message);
        }

        return ['status' => 200];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "User: " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}

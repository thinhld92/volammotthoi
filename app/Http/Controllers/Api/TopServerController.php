<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TopServer;
use Illuminate\Http\Request;

class TopServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 333;
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 2222;
        $data = $request->all();
        $logtime = date('Y-m-d H:i:s');
        $all_players = json_decode($data['data'], true);
        // dd($all_players);
        foreach ($all_players as $player) {
            $cAccName = trim($player[0]);
            $gamename = trim($player[1]);
            $level = (int) trim($player[2]);
            $exp = (int) trim($player[3]);
            $expnext = (int) trim($player[4]);
            $ip = trim($player[5]);

            $dataCreateLevelPlayer = [
                "cAccName" => $cAccName,
                "gamename" => $gamename,
                "level" => $level,
                "exp" => $exp,
                "expnext" => $expnext,
                "ip" => $ip,
                "logtime" => $logtime
            ];
            TopServer::create($dataCreateLevelPlayer);
        }

        $listTopServer = TopServer::query()
                ->select('cAccName', 'gamename', 'level', 'exp', 'expnext')
                ->whereIn('id', function($query){
                    $query->selectRaw('max(id)')->from('top_servers')->groupBy('cAccName');
                })
                ->orderBy('level', 'desc')
                ->orderBy('exp', 'desc')
                ->limit(10)
                ->get();
        return [
            'status' => 200,
            'data' => $listTopServer,
        ];
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

<?php

namespace App\Http\Controllers\Api\Games;

use App\Http\Controllers\Controller;
use App\Models\TaiXiu;
use Illuminate\Http\Request;

class TaiXiuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'All Game TaiXiu';
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
        $data = $request->all();
        $all_players = json_decode($data['data'], true);
        // dd($all_players);
        foreach ($all_players as $player) {
            $playerindex = trim($player[0]);
            $cAccName = trim($player[1]);
            $gamename = trim($player[2]);
            $coin = (int) trim($player[3]);
            $dice1 = (int) trim($player[4]);
            $dice2 = (int) trim($player[5]);
            $dice3 = (int) trim($player[6]);
            $total = (int) trim($player[7]);
            $result = trim($player[8]);
            $datcuoc = trim($player[9]);
            $tiencuoc = (int) trim($player[10]);
            $tienthuong = (int) trim($player[11]);
            $logtime = trim($player[12]);

            $dataCreateTaiXiu = [
                "playerindex" => $playerindex,
                "cAccName" => $cAccName,
                "gamename" => $gamename,
                "coin" => $coin,
                "dice1" => $dice1,
                "dice2" => $dice2,
                "dice3" => $dice3,
                "total" => $total,
                "result" => $result,
                "datcuoc" => $datcuoc,
                "tiencuoc" => $tiencuoc,
                "tienthuong" => $tienthuong,
                "logtime" => $logtime,
            ];
            TaiXiu::create($dataCreateTaiXiu);
        }
        
        return [
            'status' => 200,
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

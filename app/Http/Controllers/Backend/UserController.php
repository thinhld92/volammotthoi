<?php

namespace App\Http\Controllers\Backend;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;
use App\Models\AccountHabitus;
use App\Models\AccountMoreInfo;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = User::query()->with('account_habitus');
        if ($search) {
            $query->where('cAccName', 'like', "%{$search}%")
                ->orWhere('cEmail', 'like', "%{$search}%")
                ->orWhere('cRealName', 'like', "%{$search}%");
        }
        $users = $query
            ->orderBy('dRegDate', 'desc')
            ->paginate(10);
        $users->appends(['search'=> $search]);
        return view('backend.users.index', compact(
            'users',
            'search',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['cAccName'] = mb_strtolower($request->cAccName);
        $data['cPassWord'] = mb_strtoupper(md5($request->cPassWord));
        $data['cSecPassword'] = mb_strtoupper(md5($request->cSecPassword));
        $user = User::create($data);
        if($user){
            $data_habitus = [
                'cAccName' => mb_strtolower($request->cAccName),
                'iFlag' => 0,
                'iLeftSecond' => 0,
                'nExtPoint' => 0,
                'nExtPoint2' => 0,
                'dBeginDate' => now(),
                'iLeftMonth' => 0,
                'dEndDate' => date('Y-m-d', strtotime('+2 year')),
            ];
            $account_habitus = AccountHabitus::create($data_habitus);

            AccountMoreInfo::create([
                'cAccName' => mb_strtolower($request->cAccName),
                'cPassWord' => cPasswordEncode($request->cPassWord),
                'cSecPassword' => cPasswordEncode($request->cSecPassword),
                'registerIP' => request()->ip(),
            ]);
        }
        return redirect()->route('admin.users.index')->with('message', "Thêm mới tài khoản người dùng thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', compact(
            'user'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        if($request->cPassWord){
            $data['cPassWord'] = mb_strtoupper(md5($request->cPassWord));
        }
        if ($request->cSecPassword) {
            $data['cSecPassword'] = mb_strtoupper(md5($request->cSecPassword));
        }

        $user->update($data);

        if ($request->nExtPointPlus) {
            $user->account_habitus->update([
                'nExtPoint' => (int)$user->account_habitus->nExtPoint + (int)$request->nExtPointPlus
            ]);

            $dataPayment = [
                'cAccName' => $user->cAccName,
                'amount' => (int)$request->amount,
                'coin' => $request->nExtPointPlus,
                'status' => PaymentStatus::COMPLETED,
            ];
            if (!$request->amount) {
                $dataPayment['status'] = PaymentStatus::BONUS;
            }

            Payment::create($dataPayment);
        }

        if ($request->dEndDate) {
            $user->account_habitus->update([
                'dEndDate' => $request->dEndDate
            ]);
        }

        $user_more_info = AccountMoreInfo::where('cAccName', '=', $user->cAccName)->first();
        if ($user_more_info) {
            if ($request->cPassWord) {
                $user_more_info->cPassWord = cPasswordEncode($request->cPassWord);
            }
            if ($request->cSecPassword) {
                $user_more_info->cSecPassword = cPasswordEncode($request->cSecPassword);
            }
            $user_more_info->save();
        }
        return redirect()->route('admin.users.index')->with('success', 'Cập nhật tài khoản người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.users.index'))->with('success', 'Xoá User thành công');
    }

    // public function usersData(){
    //     $users = User::query();
    //     return DataTables::of($users)->toJson();
    // }

    public function usersList(){
        return view('backend.users.users-list');
    }

    public function updateEnddate(Request $request){
        $active = $request->active;
        $iid = $request->iid;
        $cAccName = $request->cAccName;
        $habitus = AccountHabitus::where('cAccName', '=', $cAccName)->first();
        if ($habitus) {
            if ($active) {
                $dEndDate = date('Y-m-d', strtotime('+6 month'));
            }else {
                $dEndDate = date('Y-m-d', strtotime('-1 month'));
            }
            $habitus->dEndDate = $dEndDate;
            $habitus->save();
        }
        return response()->json([
            'statusCode' => "200",
            'status' => "success",
            'dEndDate' => date('d/m/Y', strtotime($dEndDate)),
        ]);
    }

}

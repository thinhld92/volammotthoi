<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LogUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::HOTRO;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'cAccName';
    }

    protected function attemptLogin(Request $request)
    {
        $user = \App\Models\User::where([
            'cAccName' => $request->cAccName,
            'cPassWord' => mb_strtoupper(md5($request->password))
        ])->first();

        if ($user) {
            $this->guard()->login($user, false);
            LogUser::create([
                'type' => 2,
                'cAccName' => $request->cAccName,
                'ip' => request()->ip(),
            ]);
            return true;
        }

        return false;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 
            'password' => 'required|min:6',
        ],
        [
           'required' => ':attribute không được để trống',
           'min'  =>  ':attribute phải điền ít nhất :min ký tự'
        ],
        [
            $this->username() => 'Tài khoản đăng nhập',
            'password' => 'Mật khẩu'
        ]);
    }
}

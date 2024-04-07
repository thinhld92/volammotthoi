<?php

namespace App\Http\Controllers\HoTro;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Avatar;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Closure;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function edit(){
      $user = auth()->user();
      // dd($user);
      return view('hotro.users.edit', compact(
        'user',
      ));
    }

    public function update(UserRequest $request){
      $data = $request->all();
      if ($request->cPassWord) {
        $data['cPassWord'] = mb_strtoupper(md5($request->cPassWord));
      }
      if ($request->cPassWord) {
        $data['cSecPassword'] = mb_strtoupper(md5($request->cSecPassword));
      }
      $user = auth()->user();
      $user->update($data);
      return redirect()->route('hotro.dashboard')->with('success', 'Cập nhật thông tin thành công.');
    }

    public function uploadAvatar(Request $request){
      if ($request->file('avatar')) {
        $file = $request->file('avatar');
        $directory = storage_path('app/public/users/avatars/');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0775, true);
        }
        $fileName = substr(md5(uniqid().time()),6,6) . $file->getClientOriginalName();
        $urlFile = env('APP_URL').'/storage/users/avatars/' . $fileName;
        $filePath = $directory . '/' . $fileName;
        $image = Image::make($file)
                ->resize(500,500)
                ->save($filePath);

        $user = auth()->user();
        if ($user->avatar === null)
        {
            $avatar = new Avatar(['image' => $urlFile]);
            $user->avatar()->save($avatar);
        }
        else
        {
            $user->avatar->update(['image' => $urlFile]);
        }
        return response()->json([
            'urlFile' => $urlFile,
        ]);
      }

    }

    public function resetAvatar(Request $request){
      if ($request->avatar_url) {
        $avatar_url = parse_url($request->avatar_url, PHP_URL_PATH);
        $user = auth()->user();
        if ($user->avatar === null)
        {
            $avatar = new Avatar(['image' => $avatar_url]);
            $user->avatar()->save($avatar);
        }
        else
        {
            $user->avatar->update(['image' => $avatar_url]);
        }
        return response()->json([
            'urlFile' => $avatar_url,
        ]);

      }
    }

    public function showKickAccForm(){
      return view('hotro.users.kickacc');
    }

    public function kickAcc(Request $request){
      $user = auth()->user();
      $rules = [
        'currentPassword' => [
            'required',
            function ($attribute, $value, $fail) use ($user) {
                if (mb_strtoupper(md5($value)) !== $user->cPassWord) {
                    $fail("Mật khẩu xác nhận không chính xác");
                }
            },
        ],
      ];

      $message = [
        'required' => ':attribute bắt buộc phải nhập',
      ];

      $attributes = [
        'currentPassword' => "Mật khẩu xác nhận",
      ];

      $request->validate($rules, $message, $attributes);

      $user->iClientID = 0;
      $user->save();

      return redirect()->route('hotro.dashboard')->with('success', 'Kick kẹt acc thành công');
      
    }


    
}

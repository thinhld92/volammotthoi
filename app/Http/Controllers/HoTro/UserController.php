<?php

namespace App\Http\Controllers\HoTro;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\AccountMoreInfo;
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

      $maskedEmail = $user->cEMail;
      if ($maskedEmail && mb_strlen($maskedEmail) > 3) {
          $maskedEmail = mb_substr($maskedEmail, 0, 3) . str_repeat('*', mb_strlen($maskedEmail) - 3);
      }
      
      $maskedPhone = $user->cPhone;
      if ($maskedPhone && mb_strlen($maskedPhone) > 4) {
          $maskedPhone = mb_substr($maskedPhone, 0, 4) . str_repeat('*', mb_strlen($maskedPhone) - 4);
      }

      return view('hotro.users.edit', compact(
        'user',
        'maskedEmail',
        'maskedPhone'
      ));
    }

    public function update(UserRequest $request){
      $data = $request->all();
      $user = auth()->user();

      $changes = [];
      if ($request->cPassWord) {
          $changes['Password'] = ['old' => $user->cPassWord, 'new' => mb_strtoupper(md5($request->cPassWord))];
      }
      if ($request->cSecPassword) {
          $changes['SecPassword'] = ['old' => $user->cSecPassword, 'new' => mb_strtoupper(md5($request->cSecPassword))];
      }
      if ($request->cEMail && $request->cEMail != $user->cEMail) {
          $changes['Email'] = ['old' => $user->cEMail, 'new' => $request->cEMail];
      }
      if ($request->cPhone && $request->cPhone != $user->cPhone) {
          $changes['Phone'] = ['old' => $user->cPhone, 'new' => $request->cPhone];
      }
      if ($request->cRealName && $request->cRealName != $user->cRealName) {
          $changes['RealName'] = ['old' => $user->cRealName, 'new' => $request->cRealName];
      }
      if ($request->cIDNum && $request->cIDNum != $user->cIDNum) {
          $changes['IDNum'] = ['old' => $user->cIDNum, 'new' => $request->cIDNum];
      }

      foreach ($changes as $field => $val) {
          \App\Models\UserAuditLog::create([
              'user_id' => $user->id ?? null,
              'cAccName' => $user->cAccName,
              'action_type' => 'change_' . strtolower($field),
              'old_value' => $val['old'],
              'new_value' => $val['new'],
              'ip_address' => request()->ip(),
              'user_agent' => request()->userAgent(),
          ]);
      }

      if ($request->cPassWord) {
        $data['cPassWord'] = mb_strtoupper(md5($request->cPassWord));
      }
      if ($request->cSecPassword) {
        $data['cSecPassword'] = mb_strtoupper(md5($request->cSecPassword));
      }
      
      $user->update($data);

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

      try {
        if ($request->cPassWord or $request->cSecPassword) {
          auth()->logoutOtherDevices($request->cPassWord);
        }
      } catch (\Throwable $th) {
        
      }
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

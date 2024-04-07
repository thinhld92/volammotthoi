<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $user =  auth()->user();
      if (request()->isMethod('put')) {
        $validator = [
          'cRealName' => ['required', 'min:6'],
          'cEMail' => ['required', 'email', 'max:60', Rule::unique('Account_Info', 'cEMail')->ignore($user)],
          'cPassWord' => ['sometimes', 'min:6', 'confirmed'],
          'cSecPassword' => ['sometimes', 'min:6'],
          'old_cSecPassword' => ['sometimes', 'min:6', new CurrentPassword],
          'cPhone' => ['sometimes', 'digits:10', 'nullable'],
          'cIDNum' => ['sometimes', 'digits:12', 'nullable'],
        ];
      }else{
        $validator = [
          'cRealName' => ['required', 'min:6'],
          'cAccName' => ['required', 'string', 'min:5', Rule::unique('Account_Info', 'cAccName')],
          'cEMail' => ['required', 'email', 'max:60', Rule::unique('Account_Info', 'cEMail')],
          'cPassWord' => ['required', 'min:6', 'confirmed'],
          'cSecPassword' => ['required', 'min:6'],
          'old_cSecPassword' => ['sometimes', 'min:6', new CurrentPassword],
          'cPhone' => ['sometimes', 'digits:10'],
          'cIDNum' => ['sometimes', 'digits:12'],
        ];
      }
      return $validator;
    }

    protected function prepareForValidation()
    {
      if ($this->cPassWord == null) {
        $this->request->remove('cPassWord');
      }
      if ($this->cSecPassword == null) {
        $this->request->remove('cSecPassword');
        $this->request->remove('old_cSecPassword');
      }
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
      return [
        'required' => ":attribute bắt buộc phải nhập",
        'email' => ":attribute không hợp lệ",
        'confirmed' => ":attribute nhập lại không khớp",
        'string' => ':attribute phải là chuỗi',
        'alpha_dash' => ':attribute không chưa ký tự đặc biệt',
        'min' => ':attribute phải lớn hơn :min ký tự',
        'digits' => ':attribute phải bao gồm :digits số',
      ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
      return [
        'cAccName' => 'Tên đăng nhập',
        'cRealName' => 'Tên',
        'cEMail' => 'Địa chỉ email',
        'cPassWord' => 'Mật khẩu',
        'cSecPassword' => 'Mật khẩu cấp 2',
        'old_cSecPassword' => "Mật khẩu cấp 2 hiện tại",
        'cPhone' => "Số điện thoại",
        'cIDNum' => "CMND/CCCD",
      ];
    }
}

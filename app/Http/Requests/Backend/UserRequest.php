<?php

namespace App\Http\Requests\Backend;

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
      if (request()->isMethod('put') || request()->isMethod('patch')) {
        $validator = [
          'cRealName' => ['required', 'min:6'],
          'cEMail' => ['required', 'email', 'max:60', Rule::unique('Account_Info', 'cEMail')->ignore($this->user)],
          'cPassWord' => ['sometimes', 'min:6', 'confirmed'],
          'cSecPassword' => ['sometimes', 'min:6', 'confirmed'],
          'cPhone' => ['sometimes', 'digits:10', 'nullable'],
          'cIDNum' => ['sometimes', 'digits:12', 'nullable'],
          'nExtPointPlus' => ['sometimes', 'numeric', 'nullable'],
        ];
      }else{
        $validator = [
          // 'cRealName' => ['required', 'min:6'],
          // 'cEMail' => ['required', 'email', 'max:60', Rule::unique('Account_Info', 'cEMail')->ignore($this->user)],
          'cAccName' => ['required', 'string', 'min:5', Rule::unique('Account_Info', 'cAccName')->ignore($this->user)],
          'cPassWord' => ['required', 'min:6'],
          'cSecPassword' => ['required', 'min:6'],
          // 'cPhone' => ['sometimes', 'digits:10', 'nullable'],
          // 'cIDNum' => ['sometimes', 'digits:12', 'nullable'],
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
            'digits' => ':attribute phải bao gồm :digits số',
            'numeric' => ':attribute phải là một số',
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
          'cPhone' => "Số điện thoại",
          'cIDNum' => "CMND/CCCD",
          'nExtPointPlus' => "Xu thêm",
        ];
    }
}

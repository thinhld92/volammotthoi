<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
                'username' => ['required', 'string', 'min:6', Rule::unique('admins', 'username')->ignore($this->admin)],
                'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($this->admin)],
                'password' => ['sometimes', 'min:8', 'confirmed'],
            ];
        }else{
            $validator = [
                'username' => ['required', 'string', 'min:6', Rule::unique('admins', 'username')],
                'email' => ['required', 'email', Rule::unique('admins', 'email')],
                'password' => ['required', 'min:8', 'confirmed'],
            ];
        }
        return $validator;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}

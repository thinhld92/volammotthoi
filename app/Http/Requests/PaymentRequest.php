<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
        return [
            'amount' => ['required', 'integer', 'min:100'],
            'coin' => ['required', 'integer', 'min:10'],
        ];
    }

    public function messages()
    {
        return[
            'required' => ':attribute chưa được nhập',
            'integer' => ':attribute phải là số nguyên',
            'min' => ':attribute phải lớn hơn :min',
        ];
    }

    public function attributes()
    {
        return [
            'amount' => "Số tiền",
            'coin' => "Số xu",
        ];
    }

    protected function prepareForValidation()
    {
      if ($this->amount) {
        $this->request->set('amount', str_replace(',', '', $this->amount));
      }
      if ($this->coin) {
        $this->request->set('coin', str_replace(',', '', $this->coin));
      }
    }


}

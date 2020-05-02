<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
            'send_user' => 'required',
            'send_address' => 'required',
        ];
    }

    public function messages() {
        return [
            'send_user' => ':atrubute은(는) 필수 입력 사항입니다.',
            'send_address' => ':atrubute은(는) 필수 입력 사항입니다.',
        ];
    }

    public function attributes() {
        return [
            'send_user' => '받는 사람',
            'send_address' => '주소',
        ];
    }
}

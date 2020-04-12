<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionsRequest extends FormRequest
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
            'user_id' => ['required', 'max:40'],
            'password' => ['required', 'max:40'],
        ];
    }

    public function messages() {
        return [
            'user_id' => ':atrubute은(는) 필수 입력 사항입니다.',
            'password' => ':atrubute은(는) 필수 입력 사항입니다.',
        ];
    }

    public function attributes() {
        return [
            'user_id' => '아이디',
            'password' => '비밀번호',
        ];
    }
}

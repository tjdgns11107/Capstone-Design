<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => ['required', 'max:30'],
            'phone' => ['required', 'min:12', 'max:13'],
            'email' => ['required', 'max:40'],
            'password' => ['required', 'max:40', 'confirmed'],
            'password_confirmation' => ['max:40'],
        ];
    }

    public function messages() {
        return [
            'user_id' => ':atrubute은(는) 필수 입력 사항입니다.',
            'name' => ':atrubute은(는) 필수 입력 사항입니다.',
            'phone' => ':atrubute은(는) 필수 입력 사항입니다.',
            'email' => ':atrubute은(는) 필수 입력 사항입니다.',
            'password' => ':atrubute은(는) 필수 입력 사항입니다.',
            'password_confirmation' => ':atrubute은(는) 필수 입력 사항입니다.',
        ];
    }

    public function attributes() {
        return [
            'user_id' => '아이디',
            'name' => '이름',
            'phone' => '전화번호',
            'email' => '이메일',
            'password' => '비밀번호',
            'password_confirmation' => '비밀번호 확인',
        ];
    }

}

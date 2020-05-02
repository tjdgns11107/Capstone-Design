<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswersRequest extends FormRequest
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
            'answer_content' => ['required|min:10'],
        ];
    }

    public function messages() {
        return [
            'answer_content' => ':atrubute은(는) 필수 입력 사항입니다.',
        ];
    }

    public function attributes() {
        return [
            'answer_content' => '답변 내용',
        ];
    }
}

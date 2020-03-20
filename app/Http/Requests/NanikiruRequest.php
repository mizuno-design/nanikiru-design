<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NanikiruRequest extends FormRequest
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
            'question1_1' => 'required'
        ];
    }

    /**
     * エラーメッセージ
     */
    public function messages()
    {
        return [
            "required" => "必須項目です"
        ];
    }
}

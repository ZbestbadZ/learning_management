<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
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
            'ma_sv' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
        'ma_sv.required' => 'Bạn chưa nhập MSSV',
        'ma_sv.numeric' => 'MSSV không hợp lệ'
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubjectRequest extends FormRequest
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
            'name' => 'required|min:5|string',
            'ma_mh' => 'required|min:5|string',
            'description' => "required|min:10|string",
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Bạn chưa nhập tên môn học',
        'name.min'=>'Tên môn học có ít nhất 5 kí tự',
        'ma_mh.required' => 'Bạn chưa nhập mã môn học',
        'ma_mh.min'=>'Mã môn học có ít nhất 5 kí tự',
        'description.required' => 'Bạn chưa nhập phần mô tả',
        'description.min' => 'Mô tả phải có ít nhất 10 kí tự'
        ];
    }
}
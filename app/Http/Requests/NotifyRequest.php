<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifyRequest extends FormRequest
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
            'name' => 'required|min:3',
            'notify' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Bạn chưa nhập tên thông báo',
        'name.min'=>'Tên thông báo có ít nhất 3 kí tự',
        'notify.required' => 'Bạn chưa nhập nội dung',
        'notify.min'=>'Thông báo có ít nhất 3 kí tự',
        ];
    }
}
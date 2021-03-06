<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // 'username' => 'required|string|max:255|min:6',
            'password' => 'required|string|max:255|min:6',
            'new_password' => 'required|string|max:255|min:6',
            'confirm_new_password' => 'required|string|max:255|min:6|same:new_password',
        ];
    }
}

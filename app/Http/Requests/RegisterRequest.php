<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            // 'username' => 'required|string|max:255|min:6|unique:users',
            'password' => 'required|string|max:255|min:6',
            'confirm_password' => 'required|string|max:255|min:6|same:password',
            'email' => 'required|email|regex:/^.+@.+$/i|max:255|unique:users',
        ];
    }
}

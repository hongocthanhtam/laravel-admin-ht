<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

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
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        return [
            'username' => 'required|string|max:12|min:6|without_spaces|unique:users',
            'password' => 'required|string|max:12|min:6',
            'confirm_password' => 'required|string|max:12|min:6|same:password',
            'email' => 'required|email|regex:/^.+@.+$/i|max:255|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'username.without_spaces' => 'The usename must not contain space',
        ];
    }
}
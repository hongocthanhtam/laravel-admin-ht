<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ];
    }
    // public function attributes(){
    //     return [
    //         'name'=>'Tên sản phẩm',
    //         'category'=>'Loại sản phẩm',
    //         'price'=>'Giá',
    //         'quantity'=>'Kho hàng',
    //         'city' => 'Thành phố',
    //     ];
    // }
    // public function messages()
    // {
    //     return [
    //         'required'=>':attribute không được để trống',
    //         'max'=>':attribute không được quá :max ký tự',
    //         'numeric'=>':attribute phải là kiểu số nguyên dương',
    //     ];
    // }
}

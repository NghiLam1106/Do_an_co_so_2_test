<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required | email',
            'address' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Tên đăng nhập không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống'
        ];
    }
}

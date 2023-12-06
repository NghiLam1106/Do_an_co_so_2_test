<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nameproduct' => 'required',
            'price' => 'required',
            'hinhanhproduct' => 'required',
            'soluong' => 'required',
            'mausac' => 'required',
            'size' => 'required',
        ];
    }

    public function messages() {
        return [
            'nameproduct.required' => 'Tên sản phẩm không được để trống',
            'price.required' => 'Giá tiền không được để trống',
            'hinhanhproduct.required' => 'Hình ảnh không được để trống',
            'soluong.required' => 'Số lượng không được để trống',
            'mausac.required' => 'Màu săc không được để trống',
            'size.required' => 'Size không được để trống'
        ];
    }
}

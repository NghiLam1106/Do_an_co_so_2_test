<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'hinhanh' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'hinhanh.required' => 'Hình ảnh không được để trống'
        ];
    }
}

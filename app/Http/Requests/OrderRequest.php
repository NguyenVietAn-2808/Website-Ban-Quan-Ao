<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'phone' => 'required',
            'address' => 'required',


        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là thông tin bắt buộc',
            'phone.required' => 'Số Điện Thoại là thông tin bắt buộc',
            'address.required' => 'Địa chỉ là thông tin bắt buộc',
        ];
    }
}


// Trang này dùng đề validate cho form orderrequest yêu cầu khách hàng phải điền 1 số thông tin bắt buộc

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatebienLaiRequest extends FormRequest
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
            'soTienThu' => 'required|numeric|min:0',
            'ngayThu' => 'required|date',
        ];
    }

    /**
     * Customize the validation messages.
     */
    public function messages(): array
    {
        return [
            'ngayThu.required' => 'Vui lòng chọn ngày thu.',
            'soTienThu.required' => 'Vui lòng nhập số tiền học phí đã thu.',
            'soTienThu.max'  => 'Số tiền học phí không được vượt quá 100.000.000đ.',
            'soTienThu.min'  => 'Số tiền học phí không được âm.',
        ];
    }
}

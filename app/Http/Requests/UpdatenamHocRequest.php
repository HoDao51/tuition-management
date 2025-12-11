<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatenamHocRequest extends FormRequest
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
            'ngayBatDau' => 'required|date',
            'ngayKetThuc' => 'required|date|after:ngayBatDau',
        ];
    }
    public function messages()
    {
        return[
            'ngayBatDau.required' => 'Vui lòng nhập ngày bắt đầu.',
            'ngayKetThuc.required' => 'Vui lòng nhập ngày kết thúc.',
            'ngayKetThuc.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
        ];
    }
}

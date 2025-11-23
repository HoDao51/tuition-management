<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorenamHocRequest extends FormRequest
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
            'tenNamHoc' => 'required|string',
            'ngayBatDau' => 'required|date',
            'ngayKetThuc' => 'required|date|after:ngayBatDau',
        ];
    }
    public function messages()
    {
        return[
            'tenNamHoc.required' => 'Vui lòng nhập năm học.',
            'ngayBatDau.required' => 'Vui lòng nhập ngày bắt đầu.',
            'ngayKetThuc.required' => 'Vui lòng nhập ngày kết thúc.',
            'ngayKetThuc.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorehocPhiRequest extends FormRequest
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
            'id_hoc_ky' => 'required|string',
            'tongTien' => 'required|numeric|min:0|max:100000000',
        ];
    }

    /**
     * Customize the validation messages.
     */
    public function messages(): array
    {
        return [
            'id_hoc_ky.required' => 'Vui lòng chọn học kỳ.',
            'tongTien.required' => 'Vui lòng nhập số tiền học phí.',
            'tongTien.max'  => 'Số tiền học phí không được vượt quá 100.000.000đ.',
            'tongTien.min'  => 'Số tiền học phí không được âm.',
        ];
    }
}

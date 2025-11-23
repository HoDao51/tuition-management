<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatehocKyRequest extends FormRequest
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
            'tenHocKy' => 'required|string',
            'id_nam_hoc' => 'required|exists:nam_hoc,id',
        ];
    }

    /**
     * Customize the validation messages.
     */
    public function messages(): array
    {
        return [
            'tenHocKy.required' => 'Vui lòng nhập tên học kỳ.',
            'id_nam_hoc.required' => 'Vui lòng chọn năm học.',
            'id_nam_hoc.exists' => 'Năm học không tồn tại.',
        ];
    }
}

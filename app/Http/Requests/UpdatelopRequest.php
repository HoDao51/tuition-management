<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatelopRequest extends FormRequest
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
            'tenLop' => 'required|string',
            'id_khoa' => 'required|exists:khoa,id',
        ];
    }
    public function messages()
    {
        return[
            'tenLop.required' => 'Vui lòng nhập tên lớp.',
            'id_khoa.required' => 'Vui lòng chọn khoa.'
        ];
    }
}

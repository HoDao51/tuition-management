<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatenhanVienRequest extends FormRequest
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
            'hoTen' => 'required|string',
            'ngaySinh' => 'required|date|before:' . now()->subYears(18)->toDateString(),
            'gioiTinh' => 'required|in:0,1',
            'chucVu' => 'required|string',
            'soDienThoai' => 'required|regex:/^[0-9]{10}$/',
            // Email: unique nhưng bỏ qua user đang update
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->nhanVien->id)
            ],
        ];
    }

    public function messages()
    {
        return [
            'hoTen.required' => 'Vui lòng nhập họ tên.',
            'ngaySinh.required' => 'Vui lòng chọn ngày sinh.',
            'ngaySinh.before' => 'Nhân viên phải từ 18 tuổi trở lên.',
            'gioiTinh.required' => 'Vui lòng chọn giới tính.',
            'chucVu.required' => 'Vui lòng chọn chức vụ.',
            'soDienThoai.required' => 'Vui lòng nhập số điện thoại.',
            'soDienThoai.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
        ];
    }
}

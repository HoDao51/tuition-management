<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresinhVienRequest extends FormRequest
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
            'diaChi' => 'required|string',
            'soDienThoai' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:users,email',
            'id_lop' => 'required|exists:lop,id',
            'id_nam_hoc' => 'required|exists:nam_hoc,id',
        ];
    }

    public function messages()
    {
        return [
            'hoTen.required' => 'Vui lòng nhập họ tên.',
            'ngaySinh.required' => 'Vui lòng chọn ngày sinh.',
            'ngaySinh.before' => 'Nhân viên phải từ 18 tuổi trở lên.',
            'gioiTinh.required' => 'Vui lòng chọn giới tính.',
            'diaChi.required' => 'Vui lòng nhập địa chỉ.',
            'soDienThoai.required' => 'Vui lòng nhập số điện thoại.',
            'soDienThoai.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.',
            'email.required' => 'Vui lòng nhập email.',
            'id_lop.required' => 'Vui lòng chọn lớp.',
            'id_nam_hoc.required' => 'Vui lòng chọn năm học.',
        ];
    }
}

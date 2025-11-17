<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'accepted' => 'Trường :attribute phải được chấp nhận.',
    'active_url' => 'Trường :attribute không phải là một URL hợp lệ.',
    'after' => 'Trường :attribute phải là một ngày sau :date.',
    'alpha' => 'Trường :attribute chỉ được chứa chữ cái.',
    'alpha_dash' => 'Trường :attribute chỉ được chứa chữ cái, số, gạch dưới và gạch ngang.',
    'alpha_num' => 'Trường :attribute chỉ được chứa chữ cái và số.',
    'array' => 'Trường :attribute phải là mảng.',
    'before' => 'Trường :attribute phải là một ngày trước :date.',
    'between' => [
        'numeric' => 'Trường :attribute phải nằm giữa :min và :max.',
        'file' => 'Trường :attribute phải nằm giữa :min và :max kilobytes.',
        'string' => 'Trường :attribute phải nằm giữa :min và :max ký tự.',
        'array' => 'Trường :attribute phải có :min đến :max phần tử.',
    ],
    'boolean' => 'Trường :attribute phải là true hoặc false.',
    'confirmed' => 'Xác nhận :attribute không khớp.',
    'date' => 'Trường :attribute không phải là ngày hợp lệ.',
    'email' => 'Trường :attribute phải là email hợp lệ.',
    'exists' => ':attribute đã chọn không hợp lệ.',
    'unique' => ':attribute đã tồn tại.',
    'required' => 'Trường :attribute không được để trống.',
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute không được lớn hơn :max ký tự.',
        'array' => ':attribute không được nhiều hơn :max phần tử.',
    ],
    'min' => [
        'numeric' => ':attribute phải tối thiểu :min.',
        'file' => ':attribute phải tối thiểu :min kilobytes.',
        'string' => ':attribute phải tối thiểu :min ký tự.',
        'array' => ':attribute phải tối thiểu :min phần tử.',
    ],
    // Thêm các thông báo khác tùy ý

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'hoTen' => 'Họ tên',
        'email' => 'Email',
        'ngaySinh' => 'Ngày sinh',
        'soDienThoai' => 'Số điện thoại',
        'chucVu' => 'Chức vụ',
        'tinhTrang' => 'Tình trạng',
    ],

];

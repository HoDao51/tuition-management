<script src="https://cdn.tailwindcss.com"></script>
@extends('admins.layouts.app')

@section('content')
  <div class="mx-auto">
        <h2 class="text-2xl font-semibold text-orange-500 mb-6">
            Chào mừng quản trị viên trở lại!
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            <!-- Tổng nhân viên -->
                <div>
                    <a href="{{route('nhanVien.index')}}" class="bg-blue-500 text-white p-6 rounded-xl shadow-xl shadow-black/30 flex justify-center items-center w-4/5 h-[200px] mx-auto hover:bg-blue-600">
                    <!-- Nội dung chính: icon + số + chữ -->
                    <div class="flex items-center space-x-6">
                        <!-- Icon bên trái -->
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-28 h-28" fill="#222C3A" viewBox="0 0 36 36">
                                <circle cx="16.86" cy="9.73" r="6.46" fill="currentColor"/>
                                <path fill="currentColor" d="M21 28h7v1.4h-7z"/>
                                <path fill="currentColor" d="M15 30v3a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1V23a1 1 0 0 0-1-1h-7v-1.47a1 1 0 0 0-2 0V22h-2v-3.58a32 32 0 0 0-5.14-.42a26 26 0 0 0-11 2.39a3.28 3.28 0 0 0-1.88 3V30Zm17 2H17v-8h7v.42a1 1 0 0 0 2 0V24h6Z"/>
                            </svg>
                        </div>

                        <!-- Số + chữ bên phải icon -->
                        <div class="flex flex-col">
                            <!-- Số lớn -->
                            <div class="text-4xl font-bold text-center">{{ $tongNhanVien }}</div>
                            <!-- Chữ mô tả -->
                            <div class="text-lg mt-1 text-center text-[25px] font-semibold">Tổng số nhân viên</div>
                        </div>
                    </div>
                    </a>
                </div>

            <!-- Tổng sinh viên -->
                <div >
                    <a href="{{route('sinhVien.index')}}" class="bg-green-500 text-white p-6 rounded-xl shadow-xl shadow-black/30 flex justify-center items-center w-4/5 h-[200px] mx-auto hover:bg-green-600">
                    <!-- Nội dung chính: icon + số + chữ -->
                    <div class="flex items-center space-x-6">
                        <!-- Icon bên trái -->
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-28 h-28" fill="#222C3A" viewBox="0 0 256 256">
                                <path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.9 47.9 0 0 1 176 120"/>
                            </svg>
                        </div>

                        <!-- Số + chữ bên phải icon -->
                        <div class="flex flex-col">
                            <!-- Số lớn -->
                            <div class="text-4xl font-bold text-center">{{ $tongSinhVien }}</div>
                            <!-- Chữ mô tả -->
                            <div class="text-lg mt-1 text-center text-[25px] font-semibold">Tổng số sinh viên</div>
                        </div>
                    </div>
                    </a>
                </div>

            <!-- Sinh viên đã đóng học phí -->
                <div>
                    <a href="{{route('hocPhi.index')}}"  class="bg-[#F59E0B] text-white p-6 rounded-xl shadow-xl shadow-black/30 flex justify-center items-center w-4/5 h-[200px] mx-auto hover:bg-[#C4800D]">
                    <!-- Nội dung chính: icon + số + chữ -->
                    <div class="flex items-center space-x-6">
                        <!-- Icon bên trái -->
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-28 h-28" fill="#222C3A" viewBox="0 0 48 48">
                            <path fill="currentColor" fill-rule="evenodd" d="M24 44c11.046 0 20-8.954 20-20S35.046 4 24 4S4 12.954 4 24s8.954 20 20 20m10.742-26.33a1 1 0 1 0-1.483-1.34L21.28 29.567l-6.59-6.291a1 1 0 0 0-1.382 1.446l7.334 7l.743.71l.689-.762z" clip-rule="evenodd"/> 
                            </svg>
                        </div>

                        <!-- Số + chữ bên phải icon -->
                        <div class="flex flex-col">
                            <!-- Số lớn -->
                            <div class="text-4xl font-bold text-center">{{ $sinhVienDaDong }}</div>
                            <!-- Chữ mô tả -->
                            <div class="text-lg mt-1 text-center text-[25px] font-semibold">Số sinh viên<br>đã đóng học phí</div>
                        </div>
                    </div>
                    </a>
                </div>

            <!-- Sinh viên chưa đóng -->
            <div>
                <a href="{{route('hocPhi.index')}}" class="bg-[#EA3438] text-white p-6 rounded-xl shadow-xl shadow-black/30 flex justify-center items-center w-4/5 h-[200px] mx-auto hover:bg-[#C2282B]">
                <!-- Nội dung chính: icon + số + chữ -->
                <div class="flex items-center space-x-6">
                    <!-- Icon bên trái -->
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-28 h-28" fill="#222C3A" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M2 22V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18H6zm10-7q.425 0 .713-.288T13 14t-.288-.712T12 13t-.712.288T11 14t.288.713T12 15m-1-4h2V5h-2z"/>
                        </svg>
                    </div>

                    <!-- Số + chữ bên phải icon -->
                    <div class="flex flex-col">
                        <!-- Số lớn -->
                        <div class="text-4xl font-bold text-center">{{ $chuaDong }}</div>
                        <!-- Chữ mô tả -->
                        <div class="text-lg mt-1 text-center text-[25px] font-semibold">Số sinh viên<br>Chưa đóng học phí</div>
                    </div>
                </div>
                </a>
            </div>

        </div>
  </div>
@endsection

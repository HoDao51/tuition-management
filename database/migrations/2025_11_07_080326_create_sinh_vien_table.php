<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sv', 20)->unique()->nullable();
            $table->string('hoTen', 100)->notnullable();
            $table->date('ngaySinh')->notnullable();
            $table->string('gioiTinh', 10)->notnullable();
            $table->string('diaChi', 255)->notnullable();
            $table->string('soDienThoai', 20)->notnullable();
            $table->string('email', 100)->unique()->notnullable();
            $table->unsignedBigInteger('id_lop');
            $table->unsignedBigInteger('id_nam_hoc');
            $table->integer('tinhTrang')->default('0');
            $table->string('anhDaiDien')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->timestamps();
            $table->foreign('id_lop')->references('id')->on('lop');
            $table->foreign('id_nam_hoc')->references('id')->on('nam_hoc');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinh_vien');
    }
};

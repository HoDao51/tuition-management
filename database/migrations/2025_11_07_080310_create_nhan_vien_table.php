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
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nv', 20)->unique()->nullable();
            $table->string('hoTen', 100)->notnullable();
            $table->date('ngaySinh')->nullable();
            $table->integer('gioiTinh')->nullable();
            $table->integer('chucVu')->notnullable();
            $table->string('email', 100)->unique()->notnullable();
            $table->string('soDienThoai', 20)->notnullable();
            $table->string('anhDaiDien')->nullable();
            $table->integer('tinhTrang')->default('0');
            $table->unsignedBigInteger('user_id')->unique();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};

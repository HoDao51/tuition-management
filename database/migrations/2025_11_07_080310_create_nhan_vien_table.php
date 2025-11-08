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
            $table->string('ma_nv', 20)->unique()->notnullable();
            $table->string('hoTen', 100)->notnullable();
            $table->integer('chucVu')->notnullable();
            $table->string('email', 100)->notnullable();
            $table->string('soDienThoai', 20)->notnullable();
            $table->string('anhDaiDien')->nullable();
            $table->string('tinhTrang')->notnullable();
            $table->timestamps();
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

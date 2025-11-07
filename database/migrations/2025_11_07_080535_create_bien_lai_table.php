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
        Schema::create('bien_lai', function (Blueprint $table) {
            $table->id();
            $table->string('soBienLai', 50)->unique()->notnullable();
            $table->unsignedBigInteger('id_sinh_vien')->unique()->notnullable();
            $table->date('ngayThu')->notnullable();
            $table->integer('soTienThu')->notnullable();
            $table->integer('tinhTrang')->notnullable();
            $table->unsignedBigInteger('nguoiThu')->unique()->notnullable();
            $table->timestamps();
            $table->foreign('id_sinh_vien')->references('id')->on('sinh_vien');
            $table->foreign('nguoiThu')->references('id')->on('nhan_vien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_lai');
    }
};

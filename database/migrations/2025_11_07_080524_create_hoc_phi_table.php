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
        Schema::create('hoc_phi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sinh_vien')->unique();
            $table->unsignedBigInteger('id_hoc_ky')->unique();
            $table->unsignedBigInteger('nguoiTao')->unique()->nullable();
            $table->integer('tongTien')->notnullable();
            $table->integer('tinhTrang')->default('0');
            $table->timestamps();
            $table->foreign('id_sinh_vien')->references('id')->on('sinh_vien');
            $table->foreign('id_hoc_ky')->references('id')->on('hoc_ky');
            $table->foreign('nguoiTao')->references('id')->on('nhan_vien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoc_phi');
    }
};

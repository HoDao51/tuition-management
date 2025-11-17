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
            $table->unsignedBigInteger('id_hoc_phi');
            $table->integer('soTienThu');
            $table->date('ngayThu');
            $table->unsignedBigInteger('nguoiThu')->nullable();
            $table->integer('tinhTrang')->default(0);
            $table->boolean('deleted')->default(false);
            $table->timestamps();

            $table->foreign('id_hoc_phi')->references('id')->on('hoc_phi');
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

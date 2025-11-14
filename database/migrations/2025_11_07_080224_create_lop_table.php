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
        Schema::create('lop', function (Blueprint $table) {
            $table->id();
            $table->string('tenLop', 100)->notnullable();
            $table->unsignedBigInteger('id_khoa')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->foreign('id_khoa')->references('id')->on('khoa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lop');
    }
};

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
        Schema::create('hoc_ky', function (Blueprint $table) {
            $table->id();
            $table->string('tenHocKy', 50);
            $table->unsignedBigInteger('id_nam_hoc');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->foreign('id_nam_hoc')->references('id')->on('nam_hoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoc_ky');
    }
};

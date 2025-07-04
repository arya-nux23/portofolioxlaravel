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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id('id_pengalaman');
            $table->year('tahun_masuk');
            $table->year('tahun_keluar');
            $table->string('bidang_kerja');
            $table->string('perusahaan');
            $table->text('desk_pengalaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman');
    }
};

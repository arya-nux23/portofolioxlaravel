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
        Schema::create('project', function (Blueprint $table) {
            $table->integer('id_project')->autoIncrement();
            $table->integer('id_kategori');
            $table->string('nama_project');
            $table->string('nama_client');
            $table->year('tahun');
            $table->string('foto_pages');
            $table->string('foto_dashboard');
            $table->string('foto_project');
            $table->text('desk_project');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};

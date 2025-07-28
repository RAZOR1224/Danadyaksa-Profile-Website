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
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Menggantikan id_team (INT, PK, Auto-increment)
            $table->string('full_name');
            $table->string('position');
            $table->text('description')->nullable(); // Menggunakan TEXT untuk deskripsi
            $table->string('image')->nullable(); // Menyimpan path ke file gambar, bukan BLOB
            $table->timestamps(); // Otomatis membuat created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
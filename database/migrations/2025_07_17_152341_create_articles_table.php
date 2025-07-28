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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Menggantikan id_article (INT, PK, Auto-increment)
            
            // Foreign key ke tabel 'users' yang dibuat oleh Breeze
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            $table->string('title');
            $table->text('content'); // Menggunakan TEXT untuk konten yang panjang
            $table->string('image')->nullable(); // Menyimpan path ke file gambar, bukan BLOB
            $table->timestamps(); // Otomatis membuat created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
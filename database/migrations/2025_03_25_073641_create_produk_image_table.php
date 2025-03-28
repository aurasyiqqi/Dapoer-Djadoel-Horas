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
        Schema::create('produk_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_no'); // Foreign key ke produk
            $table->string('image'); // Nama file gambar
            $table->string('varian'); // Nama varian
            $table->timestamps();
        
            $table->foreign('produk_no')->references('no')->on('produks')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_image');
    }
};

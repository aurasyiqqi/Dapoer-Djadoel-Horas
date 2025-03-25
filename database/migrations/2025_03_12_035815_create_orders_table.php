<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('whatsapp');
            $table->string('email');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('ekspedisi');
            $table->enum('status', ['Pending', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

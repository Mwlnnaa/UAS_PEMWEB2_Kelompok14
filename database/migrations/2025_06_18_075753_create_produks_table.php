<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->string('nama', 45);
            $table->double('harga');
            $table->integer('stok');
            $table->integer('rating');
            $table->integer('min_stok');
            $table->foreignId('jenis_produk_id')->constrained('jenis_produk');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
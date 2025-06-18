<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_tokoh', 45);
            $table->string('komentar', 200);
            $table->integer('rating');
            $table->foreignId('produk_id')->constrained('produk');
            $table->foreignId('kategori_tokoh_id')->constrained('kategori_tokoh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimoni');
    }
};
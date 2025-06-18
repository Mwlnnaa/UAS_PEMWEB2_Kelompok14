<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        // Menambahkan kolom 'role' ke tabel 'users'
        // Kita cek dulu apakah kolomnya sudah ada, untuk jaga-jaga
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                // Membuat kolom 'role' bertipe string, nilai default 'user', setelah kolom 'email'
                $table->string('role')->default('user')->after('email');
            });
        }
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        // Saat di-rollback, kolom 'role' akan dihapus dari tabel 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
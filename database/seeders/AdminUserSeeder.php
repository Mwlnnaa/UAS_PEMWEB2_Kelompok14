<?php

namespace Database\Seeders;

use App\Models\User; // Penting: Impor Model User Anda
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting: Untuk mengenkripsi password

class AdminUserSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Membuat pengguna admin
        // Kita cek dulu apakah emailnya sudah ada untuk mencegah duplikasi
        if (User::where('email', 'admin@gmail.com')->doesntExist()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('admin123'), // Password: 'password' (teks biasa)
                'role' => 'admin', // Menetapkan role sebagai 'admin'
            ]);
            $this->command->info('Pengguna Admin (admin123@gmail.com) berhasil ditambahkan.');
        } else {
            $this->command->info('Pengguna Admin (admin123@gmail.com) sudah ada.');
        }

        // Membuat pengguna biasa
        if (User::where('email', 'user@gmail.com')->doesntExist()) {
            User::create([
                'name' => 'Pengguna Biasa',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'), // Password: 'password' (teks biasa)
                'role' => 'user', // Menetapkan role sebagai 'user'
            ]);
            $this->command->info('Pengguna Biasa (user@gmail.com) berhasil ditambahkan.');
        } else {
            $this->command->info('Pengguna Biasa (user@gmail.com) sudah ada.');
        }
    }
}

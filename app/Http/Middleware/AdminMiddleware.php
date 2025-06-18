<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting: Impor Facade Auth
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Tangani permintaan masuk.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login DAN memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Jika ya, izinkan permintaan dilanjutkan ke halaman tujuan
            return $next($request);
        }

        // Jika tidak, arahkan kembali ke halaman utama dengan pesan error
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        // Anda juga bisa menggunakan: abort(403, 'Unauthorized access.'); untuk menampilkan halaman 403
    }
}
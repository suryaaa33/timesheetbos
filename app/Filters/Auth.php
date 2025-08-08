<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // ===== Rolling Session Timeout (1 jam) =====
        $timeout = 3600; // 1 jam dalam detik

        // Jika sudah lewat dari timeout
        if (time() - session()->get('last_active') > $timeout) {
            session()->destroy();
            return redirect()->to('/login')->with('error', 'Sesi Anda telah habis. Silakan login kembali.');
        }

        // Perbarui waktu terakhir aktif
        session()->set('last_active', time());

        // ===== Pengecekan role jika ada =====
        if ($arguments) {
            // Filter: 'auth:admin' → hanya direktur
            if (in_array('admin', $arguments) && strtolower(session()->get('role')) !== 'direktur') {
                return redirect()->to('/dashboarduser');
            }

            // Filter: 'auth:user' → bukan direktur
            if (in_array('user', $arguments) && strtolower(session()->get('role')) === 'direktur') {
                return redirect()->to('/dashboard');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu digunakan untuk saat ini
    }
}

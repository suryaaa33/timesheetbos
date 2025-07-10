<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Jika butuh role tertentu
        if ($arguments) {
            // Misal filter: 'auth:admin'
            if (in_array('admin', $arguments) && strtolower(session()->get('role')) !== 'direktur') {
                return redirect()->to('/dashboarduser');
            }

            if (in_array('user', $arguments) && strtolower(session()->get('role')) === 'direktur') {
                return redirect()->to('/dashboard');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu dipakai saat ini
    }
}

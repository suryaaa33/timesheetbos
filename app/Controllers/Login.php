<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\RoleModel;

class Login extends BaseController
{
    public function index()
    {
        helper('url');
        return view('LoginView');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('employee.*, role.judul_role');
        $builder->join('role', 'role.id_role = employee.id_role');
        $builder->where('employee.username', $username);
        $query = $builder->get()->getRow();

        if ($query) {
            if (password_verify($password, $query->password)) {
                // Set session lengkap
                session()->set([
                    'logged_in'     => true,
                    'id_employee'   => $query->id_employee,
                    'nama'          => $query->nama_employee,
                    'role'          => $query->judul_role
                ]);

                // Arahkan berdasarkan role
                if (strtolower($query->judul_role) === 'direktur') {
                    return redirect()->to('/dashboard'); // Admin
                } else {
                    return redirect()->to('/dashboarduser'); // User
                }
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

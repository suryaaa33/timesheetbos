<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        helper('url');
        return view('login');
    }

    public function auth()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $db = \Config\Database::connect();
    $builder = $db->table('employee');
    $builder->where('username', $username);
    $query = $builder->get()->getRow();

    if ($query) {
        // Cek hash password
        if (password_verify($password, $query->password)) {
            // Simpan session
            session()->set([
                'id_employee'   => $query->id_employee,
                'nama_employee' => $query->nama_employee,
                'id_role'       => $query->id_role,
                'logged_in'     => true
            ]);
            return redirect()->to('/dashboard'); // Ganti ke route dashboard kamu
        } else {
            return redirect()->back()->with('error', 'Password salah');
        }
    } else {
        return redirect()->back()->with('error', 'Username tidak ditemukan');
    }
}

}

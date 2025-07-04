<?php

namespace App\Controllers;

use App\Models\RoleModel;
use CodeIgniter\Controller;

class Role extends Controller
{
    public function index()
    {
        $model = new RoleModel();
        $data['roles'] = $model->findAll();
        $data['role'] = [];
        return view('role/roleDashboard', $data);
    }

    public function store()
    {
        $model = new RoleModel();
        $model->insert([
            'judul_role' => $this->request->getPost('judul_role'),
        ]);
        return redirect()->to('/role');
    }

    public function edit($id)
    {
        $model = new RoleModel();
        $data['roles'] = $model->findAll();
        $data['role'] = $model->find($id);
        return view('role/RoleForm', $data);
    }

    public function update($id)
    {
        $model = new RoleModel();
        $model->update($id, [
            'judul_role' => $this->request->getPost('judul_role'),
        ]);
        return redirect()->to('/role');
    }

    public function delete($id)
    {
        $model = new RoleModel();
        $model->delete($id);
        return redirect()->to('/role');
    }
}

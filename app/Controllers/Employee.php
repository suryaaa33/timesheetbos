<?php namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class Employee extends Controller
{
    public function index()
    {
        $model = new EmployeeModel();
        $data['employees'] = $model->findAll();
        $data['client'] = [];
        return view('EmployeeView', $data);
    }

    public function store()
{
    $model = new EmployeeModel();
    $model -> insert([
        'nama_employee'   => $this->request->getPost('nama_employee'),
        'id_role'         => $this->request->getPost('id_role'),
        'alamat_employee' => $this->request->getPost('alamat_employee'),
        'dob_employee'    => $this->request->getPost('dob_employee'),
        'status_employee' => $this->request->getPost('status_employee'),
        'username'        => $this->request->getPost('username'),
        'password'        => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'nohp_employee'   => $this->request->getPost('nohp_employee'),
        'last_modified'   => date('Y-m-d H:i:s'),
        'author'          => 1
    ]);
    return redirect()->to('/employee');
}


    public function edit($id)
{
    $model = new EmployeeModel();
    $data ['employees'] = $model->findAll(); // tetap tampilkan semua
    $data['employee'] = $model->find($id);
    return view('EmployeeView', $data);
}


    public function update($id)
{
    $model = new EmployeeModel();
    $model->update($id, [
        'nama_employee'   => $this->request->getPost('nama_employee'),
        'id_role'         => $this->request->getPost('id_role'),
        'alamat_employee' => $this->request->getPost('alamat_employee'),
        'dob_employee'    => $this->request->getPost('dob_employee'),
        'status_employee' => $this->request->getPost('status_employee'),
        'username'        => $this->request->getPost('username'),
        'nohp_employee'   => $this->request->getPost('nohp_employee'),
        'last_modified'   => date('Y-m-d H:i:s'),
    ]);

    return redirect()->to('/employee')->with('success', 'Data berhasil diupdate.');
}


    public function delete($id)
    {
        $model = new EmployeeModel();
        $model->delete($id);
        return redirect()->to('/employee');
    }
}

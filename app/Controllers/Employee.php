<?php namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;

class Employee extends Controller
{
    public function index()
    {
        $employeemodel = new EmployeeModel();
        $rolemodel = new RoleModel();

        $data['employees'] = $employeemodel->findAll();
        $data['roles'] = $rolemodel->findAll();
        $data['client'] = [];
        return view('employee/employeeDashboard', $data);
    }

    public function create()
{
    $employeemodel = new EmployeeModel();
        $rolemodel = new RoleModel();

        $data['employees'] = $employeemodel->findAll();
        $data['roles'] = $rolemodel->findAll();
    return view('employee/EmployeeForm', $data);
}



    public function store()
{
    $employeemodel = new EmployeeModel();
    $employeemodel -> insert([
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
    $employeemodel = new EmployeeModel();
    $rolemodel = new RoleModel();

    $data ['employees'] = $employeemodel->findAll(); // tetap tampilkan semua
    $data['roles'] = $rolemodel->findAll();
    $data['employee'] = $employeemodel->find($id);
    return view('employee/EmployeeForm', $data);
}


    public function update($id)
{
    $employeemodel = new EmployeeModel();
    $employeemodel->update($id, [
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
        $employeemodel = new EmployeeModel();
        $employeemodel->delete($id);
        return redirect()->to('/employee');
    }
}

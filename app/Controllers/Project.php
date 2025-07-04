<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class Project extends Controller
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $clientModel = new ClientModel();
        $employeeModel = new EmployeeModel();

        $data['projects'] = $projectModel->findAll();
        $data['clients'] = $clientModel->findAll();
        $data['employees'] = $employeeModel->findAll();
        $data['project'] = [];

        return view('project/projectDashboard', $data);
    }

    public function store()
{
    $projectModel = new ProjectModel();
    $projectModel -> insert([
        'nama_project'   => $this->request->getPost('nama_project'),
        'deskripsi_project'         => $this->request->getPost('deskripsi_project'),
        'status_project' => $this->request->getPost('status_project'),
        'startdate_project'    => $this->request->getPost('startdate_project'),
        'enddate_project' => $this->request->getPost('enddate_project'),
        'deadline_project'        => $this->request->getPost('deadline_project'),
        'budget_project' => str_replace(['Rp', '.', ' '], '', $this->request->getPost('budget_project')),

        'id_client'   => $this->request->getPost('id_client'),
        'id_employee'   => $this->request->getPost('id_employee'),
        'last_modified'   => date('Y-m-d H:i:s'),
        'author'          => 1
    ]);
    return redirect()->to('/project');
}

public function edit($id)
{
    $projectModel = new ProjectModel();
    $clientModel = new ClientModel();
    $employeeModel = new EmployeeModel();
    
    $data ['projects'] = $projectModel->findAll(); 
    $data['clients'] = $clientModel->findAll();
    $data['employees'] = $employeeModel->findAll();
    $data['project'] = $projectModel->find($id);

    return view('project/ProjectForm', $data);
}

public function update($id)
{
    $projectModel = new ProjectModel();
    $projectModel->update($id, [
        'nama_project'   => $this->request->getPost('nama_project'),
        'deskripsi_project'         => $this->request->getPost('deskripsi_project'),
        'status_project' => $this->request->getPost('status_project'),
        'startdate_project'    => $this->request->getPost('startdate_project'),
        'enddate_project' => $this->request->getPost('enddate_project'),
        'deadline_project'        => $this->request->getPost('deadline_project'),
        'budget_project' => str_replace(['Rp', '.', ' '], '', $this->request->getPost('budget_project')),
        'id_client'   => $this->request->getPost('id_client'),
        'id_employee'   => $this->request->getPost('id_employee'),
        'last_modified'   => date('Y-m-d H:i:s'),
    ]);


    return redirect()->to('/project')->with('success', 'Data berhasil diupdate.');

}
    public function delete($id)
    {
        $projectModel = new ProjectModel();
        $projectModel->delete($id);
        return redirect()->to('/project');
    }

}

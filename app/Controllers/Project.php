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
    $clientModel  = new ClientModel();
    $employeeModel = new EmployeeModel();

    // Ambil parameter GET
    $sortBy     = $this->request->getGet('sort_by') ?? 'id_project';
    $order      = $this->request->getGet('order') ?? 'ASC';
    $clientId   = $this->request->getGet('client_id');
    $status     = $this->request->getGet('status_project');
    $startDate  = $this->request->getGet('start_date');
    $endDate    = $this->request->getGet('end_date');

    // Kolom yang valid untuk sorting
    $allowedSort = ['startdate_project', 'enddate_project', 'id_client', 'status_project'];
    if (!in_array($sortBy, $allowedSort)) {
        $sortBy = 'id_project';
    }

    // Builder query
    $builder = $projectModel->getWithClientAndEmployee();

    // Filter Client
    if (!empty($clientId)) {
        $builder->where('project.id_client', $clientId);
    }

    // Filter Status (0 atau 1 tetap masuk)
    if ($status !== '' && $status !== null) {
        $builder->where('status_project', $status);
    }

    // Filter Start Date
    if (!empty($startDate)) {
        $builder->where('startdate_project >=', $startDate);
    }

    // Filter End Date
    if (!empty($endDate)) {
        $builder->where('enddate_project <=', $endDate);
    }

    // Sorting
    $builder->orderBy($sortBy, $order);

    $data['projects']  = $builder->findAll();
    $data['clients']   = $clientModel->findAll();
    $data['employees'] = $employeeModel->findAll();

    // Simpan filter ke view biar form tetap terisi
    $data['sort_by']        = $sortBy;
    $data['order']          = $order;
    $data['client_id']      = $clientId;
    $data['status_project'] = $status;
    $data['start_date']     = $startDate;
    $data['end_date']       = $endDate;

    return view('project/projectDashboard', $data);
}




    public function create()
{
    $projectModel = new ProjectModel();
    $clientModel = new ClientModel();
    $employeeModel = new EmployeeModel();

    $data['project'] = []; 
    $data['clients'] = $clientModel->findAll();    
    $data['employees'] = $employeeModel->findAll(); 

    return view('project/ProjectForm', $data);
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
    return redirect()->to('/project')->with('success', 'Data berhasil ditambahkan.');
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
        return redirect()->to('/project')->with('success', 'Data berhasil dihapus.');
    }

}

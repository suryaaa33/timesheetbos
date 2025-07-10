<?php

namespace App\Controllers;

use App\Models\SheetModel;
use App\Models\ProjectModel;
use CodeIgniter\Controller;

class SheetUser extends Controller
{
    public function index()
    {
        $model = new SheetModel();
        $id_employee = session()->get('id_employee');

        $data['sheets'] = $model->getWithEmployeeAndProjectAndRoleByEmployee($id_employee);
        $data['sheet'] = [];

        return view('sheet/user/sheetdashboardUser', $data);
    }

    public function detail($id)
    {
        $model = new SheetModel();
        $sheet = $model->find($id);
        $id_employee = session()->get('id_employee');

        $sheet = $model->getDetailById($id, $id_employee);
        if (!$sheet) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan atau akses ditolak.');
        }

        $data['activities'] = $model->where('id_project', $sheet['id_project'])
                            ->where('id_employee', session()->get('id_employee'))
                            ->orderBy('date_sheet', 'DESC')
                            ->findAll();


        return view('sheet/user/SheetDetailUser', [
    'sheet' => $sheet,
    'activities' => $data['activities']
]);

    }

    public function create()
    {
        $projectModel = new ProjectModel();

        $data['projects'] = $projectModel->findAll();
        $data['sheet'] = [];

        return view('sheet/user/SheetForm', $data);
    }

    public function store()
{
    $model = new SheetModel();

    $model->insert([
        'id_employee'   => session()->get('id_employee'),         // ← ambil dari session
        'id_project'    => $this->request->getPost('id_project'), // ← dari form (harus ada!)
        'date_sheet'    => $this->request->getPost('date_sheet'),
        'hours_sheet'   => $this->request->getPost('hours_sheet'),
        'activity'      => $this->request->getPost('activity'),
        'result_path'   => $this->request->getPost('result_path'),
        'last_modified' => date('Y-m-d H:i:s'),
    ]);

    return redirect()->to('/sheet/user');
}


    public function edit($id)
{
    $model = new SheetModel();
    $sheet = $model->find($id);
    $id_employee = session()->get('id_employee');

    if (!$sheet || $sheet['id_employee'] != $id_employee) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan atau akses ditolak.');
    }

    $projectModel = new ProjectModel();
    $data['projects'] = $projectModel->findAll();
    $data['sheet'] = $sheet;
    return view('sheet/user/SheetForm', $data);
}

    public function update($id)
    {
        $model = new SheetModel();
        $sheet = $model->find($id);
        $id_employee = session()->get('id_employee');

        if (!$sheet || $sheet['id_employee'] != $id_employee) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan atau akses ditolak.');
        }

        $model->update($id, [
        'id_project'    => $this->request->getPost('id_project'),
        'date_sheet'    => $this->request->getPost('date_sheet'),
        'hours_sheet'   => $this->request->getPost('hours_sheet'),
        'activity'      => $this->request->getPost('activity'),
        'result_path'   => $this->request->getPost('result_path'),
        'last_modified' => date('Y-m-d H:i:s')
    ]);

        return redirect()->to('/sheet/user');
    }

    public function delete($id)
    {
        $model = new SheetModel();
        $sheet = $model->find($id);
        $id_employee = session()->get('id_employee');

        if (!$sheet || $sheet['id_employee'] != $id_employee) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan atau akses ditolak.');
        }

        $model->delete($id);
        return redirect()->to('/sheet/user');
    }

    public function add($id_project)
{
    $model = new SheetModel();

    $model->insert([
        'date_sheet'    => $this->request->getPost('date_sheet'),
        'hours_sheet'   => $this->request->getPost('hours_sheet'),
        'activity'      => $this->request->getPost('activity'),
        'result_path'   => $this->request->getPost('result_path'),
        'last_modified' => date('Y-m-d H:i:s'),
        'id_employee'   => session()->get('id_employee'),
        'id_project'    => $id_project
    ]);

    return redirect()->back()->with('success', 'Activity added successfully.');
}

public function sheetsByProject($id_project)
{
    $id_employee = session()->get('id_employee');
    $sheetModel = new \App\Models\SheetModel();

    $sheets = $sheetModel
        ->getWithEmployeeAndProjectAndRoleByEmployee($id_employee);

    // Filter hanya untuk project ini
    $sheets = array_filter($sheets, fn($s) => $s['id_project'] == $id_project);

    return view('project/user/sheetsByProject', ['sheets' => $sheets]);
}


}

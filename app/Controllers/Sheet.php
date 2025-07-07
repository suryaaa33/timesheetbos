<?php

namespace App\Controllers;

use App\Models\SheetModel;
use App\Models\EmployeeModel;
use App\Models\RoleModel;
use App\Models\ProjectModel;
use CodeIgniter\Controller;

class Sheet extends Controller
{
    public function index()
    {
        $model = new SheetModel();
        $employeeModel = new EmployeeModel();
        $roleModel = new RoleModel();

        $data['employees'] = $employeeModel->findAll();
        $data['roles'] = $roleModel->findAll();
        $data['sheets'] = $model->getWithEmployeeAndProjectAndRole();
        $data['sheet'] = [];

        return view('sheet/sheetDashboard', $data);
    }

    public function detail($id)
{
    $model = new SheetModel();
    $sheets = $model->getWithEmployeeAndProjectAndRole();

    $selected = null;
    foreach ($sheets as $row) {
        if ($row['id_sheet'] == $id) {
            $selected = $row;
            break;
        }
    }

    if (!$selected) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data sheet tidak ditemukan');
    }

    return view('sheet/SheetDetail', [
        'sheet' => $selected
    ]);
}



    public function create()
    {
        $projectModel = new ProjectModel();
        $employeeModel = new EmployeeModel();

        $data['projects'] = $projectModel->findAll();
        $data['employees'] = $employeeModel->findAll();
        $data['sheet'] = [];

        return view('sheet/SheetForm', $data);
    }

    public function store()
    {
        $model = new SheetModel();
        $model->insert([
            'date_sheet'    => $this->request->getPost('date_sheet'),
            'hours_sheet'   => $this->request->getPost('hours_sheet'),
            'activity'      => $this->request->getPost('activity'),
            'result_path'   => $this->request->getPost('result_path'),
            'id_employee'   => $this->request->getPost('id_employee'),
            'id_project'    => $this->request->getPost('id_project'),
            'last_modified' => date('Y-m-d H:i:s'),
            'author'        => 1
        ]);

        return redirect()->to('/sheet');
    }

    public function edit($id)
    {
        $model = new SheetModel();
        $data['sheet'] = $model->find($id);

        return view('sheet/SheetForm', $data);
    }

    public function update($id)
    {
        $model = new SheetModel();
        $model->update($id, [
            'date_sheet'    => $this->request->getPost('date_sheet'),
            'hours_sheet'   => $this->request->getPost('hours_sheet'),
            'activity'      => $this->request->getPost('activity'),
            'result_path'   => $this->request->getPost('result_path'),
            'last_modified' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/sheet');
    }

    public function delete($id)
    {
        $model = new SheetModel();
        $model->delete($id);

        return redirect()->to('/sheet');
    }
}

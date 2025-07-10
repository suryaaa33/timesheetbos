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
    $selected = $model->getDetailWithAllRelations($id);

    if (!$selected) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data sheet tidak ditemukan');
    }

    return view('sheet/SheetDetail', [
        'sheet' => $selected
    ]);
}

}

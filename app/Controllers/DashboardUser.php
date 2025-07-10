<?php

namespace App\Controllers;

use App\Models\SheetModel;
use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\RoleModel;
use App\Models\EmployeeModel;

class DashboardUser extends BaseController
{
    public function index()
    {
        helper('url');

        $id_employee = session()->get('id_employee');

        $sheetModel    = new SheetModel();
        $projectModel  = new ProjectModel();
        $clientModel   = new ClientModel();
        $roleModel     = new RoleModel();
        $employeeModel = new EmployeeModel();

        $sheetsAll = $sheetModel->getWithEmployeeAndProjectAndRole();

        $data['sheets'] = array_filter($sheetsAll, function ($s) use ($id_employee) {
            return $s['id_employee'] == $id_employee;
        });

        $data['total_sheet'] = $sheetModel
            ->where('id_employee', $id_employee)
            ->countAllResults();

        $data['total_project'] = $projectModel
            ->where('id_employee', $id_employee)
            ->countAllResults();

        $data['total_client'] = $clientModel->countAll();

        $employee = $employeeModel->find($id_employee);
        if ($employee && $employee['id_role']) {
            $data['role'] = $roleModel->find($employee['id_role']);
            $data['role_name'] = $data['role']['judul_role'] ?? 'No Role';
        } else {
            $data['role_name'] = 'No Role Assigned';
        }

        return view('dashboardUser', $data);
    }
}

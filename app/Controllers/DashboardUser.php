<?php

namespace App\Controllers;

use App\Models\SheetModel;
use App\Models\ProjectModel;
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
        $roleModel     = new RoleModel();
        $employeeModel = new EmployeeModel();

        // Ambil 5 sheet terbaru milik user
        $data['sheets'] = $sheetModel->getRecentSheetsByEmployee($id_employee, 5);

        $data['total_sheet'] = $sheetModel
            ->where('id_employee', $id_employee)
            ->countAllResults();

        $data['total_project'] = $projectModel
            ->where('id_employee', $id_employee)
            ->countAllResults();

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

<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\ClientModel;
use App\Models\ProjectModel;
use App\Models\MenuModel;
use App\Models\RoleModel;
use App\Models\RoledetailModel;
use App\Models\SheetModel;



class Dashboard extends BaseController
{
    public function index()
    {
        helper('url');

        $employeeModel = new EmployeeModel();
        $clientModel   = new ClientModel();
        $projectModel  = new ProjectModel();
        $menuModel = new MenuModel();
        $roleModel = new RoleModel();
        $roledetailModel = new RoledetailModel();
        $sheetModel = new SheetModel();

        
        $data['total_employee'] = $employeeModel->countAll();
        $data['total_client']   = $clientModel->countAll();
        $data['total_project']  = $projectModel->countAll();
        $data['total_menu'] = $menuModel->countAll();
        $data['total_role'] = $roleModel->countAll();
        $data['total_roledetail'] = $roledetailModel->countAll();
        $data['total_sheet'] = $sheetModel->countAll();

        return view('dashboardAdmin', $data);
    }
}

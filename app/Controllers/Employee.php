<?php

namespace App\Controllers;
use App\Models\EmployeeModel;

class Employee extends BaseController
{
    public function index()
    {
        $model = new EmployeeModel();
        $data['employees'] = $model->findAll();
        return view('EmployeeView', $data);
    }
}

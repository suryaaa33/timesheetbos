<?php

namespace App\Controllers;

use App\Models\RoleModel;

class Role extends BaseController
{
    public function index()
    {
        $model = new RoleModel();
        $data['roles'] = $model->findAll();
        return view('RoleView', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\RoledetailModel;

class Roledetail extends BaseController
{
    public function index()
    {
        $model = new RoledetailModel();
        $data['roledetails'] = $model->getWithNames();
        return view('RoleDetailView', $data);
    }
}

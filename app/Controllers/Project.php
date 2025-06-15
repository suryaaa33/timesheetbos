<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Project extends BaseController
{
    public function index()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll();
        return view('ProjectView', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\ClientModel;

class client extends BaseController
{
    public function index()
    {
        $model = new ClientModel();
        $data['clients'] = $model->findAll();
        return view('ClientView', $data);
    }
}

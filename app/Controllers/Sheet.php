<?php

namespace App\Controllers;

use App\Models\SheetModel;

class Sheet extends BaseController
{
    public function index()
    {
        $model = new SheetModel();
        $data['sheets'] = $model->getWithRelations();
        return view('SheetView', $data);
    }
}

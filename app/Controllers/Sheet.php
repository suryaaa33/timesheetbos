<?php namespace App\Controllers;

use App\Models\SheetModel;
use CodeIgniter\Controller;

class Sheet extends Controller
{
    public function index()
    {
        $model = new SheetModel();
        $data['sheets'] = $model->findAll();
        return view('sheet/sheetDashboard', $data);
    }

    public function store()
    {
        $model = new SheetModel();
        $model->insert([
            'date_sheet' => $this->request->getPost('date_sheet'),
            'hours_sheet'     => $this->request->getPost('hours_sheet'),
            'activity'     => $this->request->getPost('activity'),
            'result_path'         => $this->request->getPost('result_path'),
            'last_modified' => date('Y-m-d H:i:s'),
            'author'        => 1
        ]);

        return redirect()->to('/sheet');
    }

    public function updateAll()
{
    $model       = new SheetModel();
    $ids         = $this->request->getPost('id_sheet');
    $tanggal     = $this->request->getPost('tanggal');
    $jam         = $this->request->getPost('jam');
    $aktivitas   = $this->request->getPost('aktivitas');
    $hasil       = $this->request->getPost('hasil');

    foreach ($ids as $i => $id) {
        $model->update($id, [
            'date_sheet'    => $tanggal[$i],
            'hours_sheet'   => $jam[$i],
            'activity'      => $aktivitas[$i],
            'result_path'   => $hasil[$i],
            'last_modified' => date('Y-m-d H:i:s')
        ]);
    }

    return redirect()->to('/sheet')->with('success', 'Semua data diperbarui.');
}


    public function delete($id)
    {
        $model = new SheetModel();
        $model->delete($id);
        return redirect()->to('/sheet');
    }
}

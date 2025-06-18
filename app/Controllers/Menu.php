<?php namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Controller;

class Menu extends Controller
{
    public function index()
    {
        $model = new MenuModel();
        $data['menus'] = $model->findAll();
        $data['menu'] = [];
        return view('MenuView', $data);
    }

    public function store()
    {
        $model = new MenuModel();
        $model->insert([
            'nama_menu' => $this->request->getPost('nama_menu')
        ]);
        return redirect()->to('/menu');
    }

    public function edit($id)
    {
        $model = new MenuModel();
        $data['menus'] = $model->findAll();
        $data['menu'] = $model->find($id);
        return view('MenuView', $data);
    }

    public function update($id)
    {
        $model = new MenuModel();
        $model->update($id, [
            'nama_menu' => $this->request->getPost('nama_menu')
        ]);
        return redirect()->to('/menu');
    }

    public function delete($id)
    {
        $model = new MenuModel();
        $model->delete($id);
        return redirect()->to('/menu');
    }
}

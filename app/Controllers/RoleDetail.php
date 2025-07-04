<?php namespace App\Controllers;

use App\Models\RoleDetailModel;
use App\Models\RoleModel;
use App\Models\MenuModel;
use CodeIgniter\Controller;

class RoleDetail extends Controller
{
    public function index()
    {
        $model = new RoleDetailModel();
        $roleModel = new RoleModel();
        $menuModel = new MenuModel();

        $data['roledetails'] = $model->findAll();
        $data['roles'] = $roleModel->findAll();
        $data['menus'] = $menuModel->findAll();
        $data['roledetail'] = [];

        return view('roledetail/roledetailDashboard', $data);
    }

    public function store()
    {
        $model = new RoleDetailModel();
        $model->insert([
            'id_role' => $this->request->getPost('id_role'),
            'id_menu' => $this->request->getPost('id_menu'),
        ]);

        return redirect()->to('/roledetail');
    }

    public function edit($id)
    {
        $model = new RoleDetailModel();
        $roleModel = new RoleModel();
        $menuModel = new MenuModel();

        $data['roledetails'] = $model->findAll();
        $data['roles'] = $roleModel->findAll();
        $data['menus'] = $menuModel->findAll();
        $data['roledetail'] = $model->find($id);

        return view('roledetail/RoledetailForm', $data);
    }

    public function update($id)
    {
        $model = new RoleDetailModel();
        $model->update($id, [
            'id_role' => $this->request->getPost('id_role'),
            'id_menu' => $this->request->getPost('id_menu'),
        ]);

        return redirect()->to('/roledetail');
    }

    public function delete($id)
    {
        $model = new RoleDetailModel();
        $model->delete($id);

        return redirect()->to('/roledetail');
    }
}

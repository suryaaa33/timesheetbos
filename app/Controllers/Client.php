<?php namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class Client extends Controller
{
    public function index()
{
    $model = new ClientModel();
    $data['clients'] = $model->findAll(); // list semua
    $data['client'] = []; // untuk form create (kosong dulu)
    return view('ClientView', $data);
}

    public function store()
    {
        $model = new ClientModel();
        $model->insert([
            'nama_client'         => $this->request->getPost('nama_client'),
            'notelp_client'       => $this->request->getPost('notelp_client'),
            'email_client'        => $this->request->getPost('email_client'),
            'status_client'        => $this->request->getPost('status_client'),
            'namacp_client'       => $this->request->getPost('namacp_client'),
            'noHp_cp'       => $this->request->getPost('noHp_cp'),
            'registerdate_client'    => $this->request->getPost('registerdate_client'),
            'last_modified'       => date('Y-m-d H:i:s'),
            'author'              => 1
        ]);

        return redirect()->to('/client');
    }

    // Tidak perlu view edit terpisah
    public function edit($id)
{
    $model = new ClientModel();
    $data['clients'] = $model->findAll(); // tetap tampilkan semua
    $data['client'] = $model->find($id); // data yang mau diedit
    return view('ClientView', $data);
}

    public function update($id)
    {
        $model = new ClientModel();
        $model->update($id, [
            'nama_client'   => $this->request->getPost('nama_client'),
            'notelp_client' => $this->request->getPost('notelp_client'),
            'email_client'  => $this->request->getPost('email_client'),
            'status_client'        => $this->request->getPost('status_client'),
            'namacp_client'       => $this->request->getPost('namacp_client'),
            'noHp_cp'       => $this->request->getPost('noHp_cp'),
            'registerdate_client'    => $this->request->getPost('registerdate_client'),
            'last_modified' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/client');
    }

    public function delete($id)
    {
        $model = new ClientModel();
        $model->delete($id);
        return redirect()->to('/client');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class RoledetailModel extends Model
{
    protected $table = 'roledetail';
    protected $primaryKey = 'id_roledetail';
    protected $allowedFields = ['id_menu', 'id_role'];

    public function getWithNames()
    {
        return $this->select('roledetail.id_roledetail, menu.nama_menu, role.judul_role')
                    ->join('menu', 'menu.id_menu = roledetail.id_menu')
                    ->join('role', 'role.id_role = roledetail.id_role')
                    ->findAll();
    }
}

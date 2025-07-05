<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $allowedFields = ['judul_role'];

    public function getRolesWithEmployeeCount()
{
    return $this->select('role.*, COUNT(employee.id_role) as total_employee')
                ->join('employee', 'employee.id_role = role.id_role', 'left')
                ->groupBy('role.id_role')
                ->findAll();
}

}

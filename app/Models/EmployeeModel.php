<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id_employee';
    protected $allowedFields = [
        'nama_employee', 'id_role', 'alamat_employee', 'dob_employee',
        'status_employee', 'username', 'password', 'nohp_employee',
        'last_modified', 'author'
    ];
}

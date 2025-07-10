<?php

namespace App\Models;

use CodeIgniter\Model;

class SheetModel extends Model
{
    protected $table = 'sheet';
    protected $primaryKey = 'id_sheet';
    protected $allowedFields = [
        'date_sheet',
        'hours_sheet',
        'activity',
        'result_path',
        'id_employee',
        'id_project',
        'last_modified',
        'author'
    ];

public function getWithEmployeeAndProjectAndRole()
{
    return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role')
                ->join('employee', 'employee.id_employee = sheet.id_employee', 'left')
                ->join('project', 'project.id_project = sheet.id_project', 'left')
                ->join('role', 'role.id_role = employee.id_role', 'left')
                ->orderBy('date_sheet', 'DESC')
                ->findAll();
}


public function getWithEmployeeAndProjectAndRoleByEmployee($id_employee)
{
    return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role')
        ->join('employee', 'employee.id_employee = sheet.id_employee')
        ->join('project', 'project.id_project = sheet.id_project')
        ->join('role', 'role.id_role = employee.id_role')
        ->where('sheet.id_employee', $id_employee)
        ->findAll();
}

public function getDetailById($id_sheet, $id_employee)
{
    return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role')
        ->join('employee', 'employee.id_employee = sheet.id_employee')
        ->join('project', 'project.id_project = sheet.id_project')
        ->join('role', 'role.id_role = employee.id_role')
        ->where('sheet.id_employee', $id_employee)
        ->where('sheet.id_sheet', $id_sheet)
        ->first();
}

public function getDetailWithAllRelations($id_sheet)
{
    return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role')
                ->join('employee', 'employee.id_employee = sheet.id_employee', 'left')
                ->join('project', 'project.id_project = sheet.id_project', 'left')
                ->join('role', 'role.id_role = employee.id_role', 'left')
                ->where('sheet.id_sheet', $id_sheet)
                ->first();
}



}

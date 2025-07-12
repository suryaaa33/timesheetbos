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

    public function getSheetsWithDurationByEmployee($id_employee)
    {
        return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role, SUM(sheet.hours_sheet) as total_minutes')
            ->join('employee', 'employee.id_employee = sheet.id_employee')
            ->join('project', 'project.id_project = sheet.id_project')
            ->join('role', 'role.id_role = employee.id_role')
            ->where('sheet.id_employee', $id_employee)
            ->groupBy('sheet.id_project')
            ->orderBy('sheet.last_modified', 'DESC')
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

    public function getSheetsSummaryByProject($id_project)
    {
        return $this->db->table('sheet s')
            ->select('s.id_sheet, s.id_project, p.nama_project, e.nama_employee, r.judul_role, 
                    SUM(s.hours_sheet) as total_minutes, MAX(s.last_modified) as last_modified')
            ->join('employee e', 's.id_employee = e.id_employee')
            ->join('project p', 's.id_project = p.id_project')
            ->join('role r', 'r.id_role = e.id_role')
            ->where('s.id_project', $id_project)
            ->groupBy('s.id_employee') // satu baris per employee dalam project tersebut
            ->get()
            ->getResultArray();
    }

    public function getAllSheetsByProject($id_project)
{
    return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role')
                ->join('employee', 'employee.id_employee = sheet.id_employee')
                ->join('project', 'project.id_project = sheet.id_project')
                ->join('role', 'role.id_role = employee.id_role')
                ->where('sheet.id_project', $id_project)
                ->orderBy('sheet.date_sheet', 'DESC')
                ->findAll();
}

public function getSheetsByProjectAndEmployee($id_project, $id_employee)
{
    return $this->select('sheet.*, employee.nama_employee, project.nama_project, role.judul_role')
                ->join('employee', 'employee.id_employee = sheet.id_employee')
                ->join('project', 'project.id_project = sheet.id_project')
                ->join('role', 'role.id_role = employee.id_role')
                ->where('sheet.id_project', $id_project)
                ->where('sheet.id_employee', $id_employee)
                ->orderBy('sheet.date_sheet', 'DESC')
                ->findAll();
}

}

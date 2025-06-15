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

    public function getWithRelations()
    {
        return $this->select('sheet.*, employee.nama_employee, project.nama_project')
                    ->join('employee', 'employee.id_employee = sheet.id_employee')
                    ->join('project', 'project.id_project = sheet.id_project')
                    ->orderBy('date_sheet', 'DESC')
                    ->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    protected $allowedFields = [
        'nama_project', 'deskripsi_project', 'status_project',
        'startdate_project', 'enddate_project', 'deadline_project',
        'budget_project', 'id_client', 'id_employee', 'last_modified', 'author'
    ];

    public function getWithClientAndEmployee()
{
    return $this->select('project.*, client.nama_client, employee.nama_employee')
                ->join('client', 'client.id_client = project.id_client')
                ->join('employee', 'employee.id_employee = project.id_employee')
                ->findAll();
}



}

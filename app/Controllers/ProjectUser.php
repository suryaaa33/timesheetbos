<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\Controller;

class ProjectUser extends Controller
{
    public function index()
    {
        $id_employee = session()->get('id_employee');

        // Ambil hanya project yang berhubungan dengan employee ini
        $model = new ProjectModel();
        $projects = $model
            ->select('project.*, client.nama_client, employee.nama_employee')
            ->join('client', 'client.id_client = project.id_client')
            ->join('employee', 'employee.id_employee = project.id_employee')
            ->where('project.id_employee', $id_employee)  // filter by employee PIC
            ->findAll();

        return view('project/user/projectdashboardUser', ['projects' => $projects]);
    }

// public function sheetsByProject($id_project)
// {
//     $sheetModel = new \App\Models\SheetModel();

//     $summaries = $sheetModel->getSheetsSummaryByProject($id_project);

//     return view('project/user/SheetsByProject', [
//         'summaries' => $summaries
//     ]);
// }



public function detailSheetByProject($id_project)
{
    $sheetModel = new \App\Models\SheetModel();

    $sheets = $sheetModel->getAllSheetsByProject($id_project);

    if (!$sheets) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data sheet tidak ditemukan.");
    }

    $data = [
        'activities' => $sheets,
        'sheet' => $sheets[0]
    ];

    return view('project/user/SheetsByProjectDetail', $data);
}


}

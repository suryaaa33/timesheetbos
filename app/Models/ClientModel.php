<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id_client';
    protected $allowedFields = [
        'nama_client', 'notelp_client', 'email_client', 'status_client',
        'namacp_client', 'noHp_cp', 'registerdate_client', 'last_modified', 'author'
    ];
}

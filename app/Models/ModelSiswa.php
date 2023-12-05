<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'nama_siswa', 'nipd'];

}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Utility extends BaseController
{
    public function backupDB()
    {
        $data['title'] = ' backupDB | warehouse';
        return view('utility/backupDB', $data);
    }
}

<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard | Fathanalii';
        return view('dashboard/v_dashboard', $data);
    }
}

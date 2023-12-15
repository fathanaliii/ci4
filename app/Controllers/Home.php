<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function data()
    {
        $data['title'] = ' HOME | Fathanalii';
        return view('templates/landing', $data);
    }
    public function index()
    {
        $data['title'] = 'Dashboard | Fathanalii';
        return view('dashboard/v_dashboard', $data);
    }
}

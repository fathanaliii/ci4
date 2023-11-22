<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/v_login');
    }
    public function register()
    {
        return view('auth/v_register');
    }
    public function user()
    {
        return view('user/v_index');
    }
}

<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function data()
    {
        $data['title'] = ' HOME | Fathanalii';
        return view('templates/landing', $data);
    }
    public function index($id = 0)
    {
        $data['title'] = ' Profile User | Fathanalii';

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();
        return view('dashboard/v_dashboard', $data);
    }
}

<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\User_model;

class User extends Controller
{
    public function __construct()
    {
        Signin::isLogin();
    }
    public function index()
    {
        $data['judul']  = 'Profile User';
        $data['profile'] = $this->model(User_model::class)->getProfile();
        $this->view('templates/header', $data);
        $this->view('user/profile', $data);
        $this->view('templates/footer');
    }
}

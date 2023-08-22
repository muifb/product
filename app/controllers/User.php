<?php

class User extends Controller
{
    public function __construct()
    {
        Signin::isLogin();
    }
    public function index()
    {
        $data['judul']  = 'Profile User';
        $data['profile'] = $this->model('User_model')->getProfile();
        $this->view('templates/header', $data);
        $this->view('user/profile', $data);
        $this->view('templates/footer');
    }
}

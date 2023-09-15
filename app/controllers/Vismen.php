<?php

use MyApp\Core\Controller;

class Vismen extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {
        $data['judul']  = 'Visment List Order';
        $data['vismen'] = $this->model('Vismen_model')->getVismen();
        $this->view('templates/header', $data);
        $this->view('vismen/index', $data);
        $this->view('templates/footer');
    }
    public function report()
    {
        var_dump($this->model('Product_model')->getAllProduct());
    }
}

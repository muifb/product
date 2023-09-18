<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Vismen_model;
use MyApp\Models\Product_model;

class Vismen extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {
        $data['judul']  = 'Visment List Order';
        $data['vismen'] = $this->model(Vismen_model::class)->getVismen();
        $this->view('templates/header', $data);
        $this->view('vismen/index', $data);
        $this->view('templates/footer');
    }
    public function report()
    {
        var_dump($this->model(Product_model::class)->getAllProduct());
    }
}

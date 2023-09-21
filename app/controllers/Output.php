<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Product_model;

class Output extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {
        $data = [
            'judul'  => 'Data Output Product',
            'product' => $this->model(Product_model::class)->getAllProduct(),
            'output' => $this->model(Product_model::class)->count()
        ];
        $this->view('templates/header', $data);
        $this->view('output/index', $data);
        $this->view('templates/footer');
    }
}

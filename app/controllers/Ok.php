<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Product_model;

class Ok extends Controller
{
    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Data Product OK';
        $data['product'] = $this->model(Product_model::class)->getProductOk();
        $this->view('templates/header', $data);
        $this->view('ok/index', $data);
        $this->view('templates/footer');
    }
}

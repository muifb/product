<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Product_model;

class Nc extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Data Product NC';
        $data['product'] = $this->model(Product_model::class)->getProductNc();
        $this->view('templates/header', $data);
        $this->view('nc/index', $data);
        $this->view('templates/footer');
    }
}

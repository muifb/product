<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Product_model;

class Reject extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Data Product Reject';
        $data['product'] = $this->model(Product_model::class)->getProductReject();
        $this->view('templates/header', $data);
        $this->view('reject/index', $data);
        $this->view('templates/footer');
    }
}

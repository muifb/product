<?php

use MyApp\Core\Controller;

class Ok extends Controller
{
    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Data Product OK';
        $data['product'] = $this->model('Product_model')->getProductOk();
        $this->view('templates/header', $data);
        $this->view('ok/index', $data);
        $this->view('templates/footer');
    }
}

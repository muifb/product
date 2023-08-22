<?php

class Nc extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Data Product NC';
        $data['product'] = $this->model('Product_model')->getProductNc();
        $this->view('templates/header', $data);
        $this->view('nc/index', $data);
        $this->view('templates/footer');
    }
}

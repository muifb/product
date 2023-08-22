<?php

class Output extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {
        $data['judul']  = 'Data Output Product';
        $data['product'] = $this->model('Product_model')->getAllProduct();
        $this->view('templates/header', $data);
        $this->view('output/index', $data);
        $this->view('templates/footer');
    }
}

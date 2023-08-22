<?php

class Reject extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Data Product Reject';
        $data['product'] = $this->model('Product_model')->getProductReject();
        $this->view('templates/header', $data);
        $this->view('reject/index', $data);
        $this->view('templates/footer');
    }
}

<?php

class Lost extends Controller
{
    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data['judul']  = 'Lost Time Product';
        $data['vismen']  = $this->model('Vismen_model')->getVismenById();
        $data['product'] = $this->model('Product_model')->getProductNc();
        $this->view('templates/header', $data);
        $this->view('lost/index', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        // var_dump($_POST);
        if ($this->model('Lost_model')->insertLost($_POST) > 0) {
            Flasher::setFlash('Lost Time', 'berhasil disimpan', 'success');
            header('Location: /lost');
            exit;
        } else {
            Flasher::setFlash('Lost Time', 'gagal disimpan', 'success');
            header('Location: /lost');
            exit;
        }
    }
}

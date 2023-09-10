<?php

class Landing extends Controller
{
    public function __construct()
    {
        Signin::login();
    }

    public function index()
    {
        $this->view('404/404');
    }

    public function oee()
    {
        $this->view('404/404');
    }

    public function vismen()
    {
        $data = [
            'nav' => 'vismen',
            'judul' => 'Vismen',
            'vismen' => $this->model('Vismen_model')->getVismen()
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/vismen', $data);
        $this->view('templates/landing_footer');
    }

    public function tambah_vismen()
    {
        Signin::isLoginAdmin();
        $data = [
            'nav' => 'vismen',
            'judul' => 'Vismen',
            'nopro' => $this->model('Vismen_model')->getNopro()
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/tambah-vismen', $data);
        $this->view('templates/landing_footer');
    }

    public function product()
    {
        $this->view('404/404');
    }

    public function store()
    {
        if ($this->model('Vismen_model')->insertVismen($_POST) > 0) {
            Flasher::setFlash('Vismen', 'berhasil ditambah!.', 'success');
            header('Location: /landing/vismen');
            exit;
        } else {
            Flasher::setFlash('Vismen', 'gagal ditambah!.', 'success');
            header('Location: /landing/vismen');
            exit;
        }
    }

    public function storeProduct()
    {
        // var_dump($_POST);
        // if ($this->model('Product_model')->insertProduct($_POST) > 0) {
        //     Flasher::setFlash('Product', 'berhasil ditambah!.', 'success');
        //     header('Location: /landing/product');
        //     exit;
        // } else {
        //     Flasher::setFlash('Product', 'gagal ditambah!.', 'success');
        //     header('Location: /landing/product');
        //     exit;
        // }
        $this->view('404/404');
    }

    public function search()
    {
        $this->view('404/404');
    }

    public function getProduct()
    {
        echo json_encode($this->model('Product_model')->getProductById($_POST['id']));
    }
}

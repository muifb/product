<?php

class Landing extends Controller
{
    public function __construct()
    {
        Signin::login();
    }

    public function index()
    {
        $data = [
            'nav' => 'index',
            'judul' => 'Home'
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/index', $data);
        $this->view('templates/landing_footer');
    }

    public function oee()
    {
        $data = [
            'nav' => 'oee',
            'judul' => 'OEE',
            'product' => $this->model('Vismen_model')->getVismen(),
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/oee', $data);
        $this->view('templates/landing_footer');
    }

    public function vismen()
    {
        $data = [
            'nav' => 'vismen',
            'judul' => 'Vismen',
            'product' => $this->model('Product_model')->getProduct(),
            'vismen' => $this->model('Vismen_model')->getVismen()
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/vismen', $data);
        $this->view('templates/landing_footer');
    }


    public function product()
    {
        $data = [
            'nav' => 'product',
            'judul' => 'Product',
            'product' => $this->model('Product_model')->getProduct()
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/product', $data);
        $this->view('templates/landing_footer');
    }

    public function store()
    {
        // $this->model('Vismen_model')->insertVismen($_POST);
        // var_dump($_POST);
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
        if ($this->model('Product_model')->insertProduct($_POST) > 0) {
            Flasher::setFlash('Product', 'berhasil ditambah!.', 'success');
            header('Location: /landing/product');
            exit;
        } else {
            Flasher::setFlash('Product', 'gagal ditambah!.', 'success');
            header('Location: /landing/product');
            exit;
        }
    }

    public function search()
    {
        $data = [
            'nav' => 'oee',
            'judul' => 'OEE',
            'search' => $this->model('Vismen_model')->getSearch(),
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/hasil', $data);
        $this->view('templates/landing_footer');
        // echo json_encode($_POST);
    }

    public function getProduct()
    {
        echo json_encode($this->model('Product_model')->getProductById($_POST['id']));
    }
}

<?php

namespace MyApp\Controllers;

use Signin;
use Flasher;
use MyApp\Core\Controller;
use MyApp\Models\Vismen_model;
use MyApp\Models\Product_model;

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
            'vismen' => $this->model(Vismen_model::class)->getVismen()
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/vismen', $data);
        $this->view('templates/landing_footer');
    }

    public function create()
    {
        Signin::isLoginAdmin();
        $data = [
            'nav' => 'vismen',
            'judul' => 'Vismen',
            'nopro' => $this->model(Vismen_model::class)->getNopro()
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
        // var_dump($_POST['nm_product'] . ' ' . $_POST['ukuran']);
        // die;
        if ($this->model(Vismen_model::class)->insertVismen($_POST) > 0) {
            Flasher::setFlash('Vismen', 'berhasil ditambah!.', 'success');
            header('Location: /vismen/list');
            exit;
        } else {
            Flasher::setFlash('Vismen', 'gagal ditambah!.', 'success');
            header('Location: /vismen/list');
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
        echo json_encode($this->model(Product_model::class)->getProductById($_POST['id']));
    }

    public function profile()
    {
        Signin::isLoginAdmin();
        $data = [
            'nav' => 'profile',
            'judul' => 'Profile'
        ];
        $this->view('templates/landing_header', $data);
        $this->view('landing/profile', $data);
        $this->view('templates/landing_footer');
    }
}

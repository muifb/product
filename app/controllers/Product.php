<?php

class Product extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {
        $data['judul']  = 'Data Product';
        $data['product'] = $this->model('Product_model')->getAllProduct();
        $this->view('templates/header', $data);
        $this->view('product/index', $data);
        $this->view('templates/footer');
    }

    public function show()
    {
        echo json_encode($this->model('Product_model')->getReportById($_POST['id']));
    }

    public function resend()
    {
        // var_dump($_POST);
        if ($this->model('Product_model')->resendReportById($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'direpost', 'success');
            header('Location: /produksi/edit-receipt');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'direpost', 'danger');
            header('Location: /produksi/edit-receipt');
            exit;
        }
    }
}

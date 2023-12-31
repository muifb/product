<?php

namespace MyApp\Controllers;

use Signin;
use Flasher;
use MyApp\Core\Controller;
use MyApp\Models\User_model;
use MyApp\Models\Batch_model;
use MyApp\Models\Vismen_model;
use MyApp\Models\Product_model;

class Home extends Controller
{

    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {
        $data  = [
            'judul' => 'Laporan Produksi',
            'vismen' => $this->model(Vismen_model::class)->getVismenById(),
            'product' => $this->model(Product_model::class)->getById()
        ];

        // $this->view('templates/header', $data);
        $this->view('home/index', $data);
        // $this->view('templates/footer');
    }
    public function create()
    {
        $data['judul']  = 'Create Batch';
        $data['vismen']  = $this->model(Vismen_model::class)->getVismenById();
        $data['kode'] = $this->model(Batch_model::class)->getKode();
        $this->view('templates/header', $data);
        $this->view('home/create', $data);
        $this->view('templates/footer');
    }
    public function receipt()
    {
        $data['judul']  = 'Good Receipt';
        $data['batch']  = $this->model(Batch_model::class)->getBatch();
        // var_dump($data['batch']);
        // die;
        $this->view('templates/pro_header', $data);
        $this->view('home/good_receipt', $data);
        $this->view('templates/pro_footer');
    }
    public function edit()
    {
        $data['judul']  = 'Edit Data Produksi';
        $data['product'] = $this->model(Product_model::class)->getAllProduct();
        $this->view('templates/pro_header', $data);
        $this->view('home/edit_good', $data);
        $this->view('templates/pro_footer');
    }
    public function store()
    {
        // var_dump($_POST);
        if ($this->model(Batch_model::class)->insertBatch($_POST) > 0) {
            Flasher::setFlash('Batch dalam', 'berhasil dicetak', 'success');
            header('Location: /produksi/create-batch');
            exit;
        } else {
            Flasher::setFlash('Batch dalam', 'gagal dicetak', 'success');
            header('Location: /produksi/create-batch');
            exit;
        }
    }
    public function posting()
    {
        if ($_POST['matrial'][0] == null || $_POST['status'][1] == null || $_POST['start'][2] == null || $_POST['finish'][3] == null || $_POST['angka'][4] == null) {
            Flasher::setFlash('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>', 'Silahkan isi semua data.', 'danger');
            header('Location: /produksi/good-receipt');
            exit;
        } else {
            if ($this->model(Batch_model::class)->postBatch($_POST) > 0) {
                Flasher::setFlash('Berhasil', 'dipost', 'success');
                header('Location: /produksi/good-receipt');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'dipost', 'danger');
                header('Location: /produksi/good-receipt');
                exit;
            }
        }
    }

    public function update()
    {
        // var_dump($_POST);
        if ($this->model(Batch_model::class)->updateBatch($_POST) > 0) {
            Flasher::setFlash('Batch luar', 'berhasil dicetak', 'success');
            header('Location: /produksi/create-batch');
            exit;
        } else {
            Flasher::setFlash('Batch luar', 'gagal dicetak', 'success');
            header('Location: /produksi/create-batch');
            exit;
        }
    }

    public function about()
    {
        $data['judul'] = 'About Me';
        $data['about'] = $this->model(User_model::class)->getUser();
        $this->view('templates/header', $data);
        $this->view('home/about', $data);
        $this->view('templates/footer');
    }
}

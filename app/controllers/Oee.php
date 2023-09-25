<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Vismen_model;

class Oee extends Controller
{
    public function __construct()
    {
        Signin::isLogin();
    }

    public function index()
    {

        $data = [
            'nav' => 'oee',
            'judul' => 'Data OEE',
            'product' => $this->model(Vismen_model::class)->getVismen()
        ];
        $this->view('templates/header', $data);
        $this->view('landing/oee', $data);
        $this->view('templates/footer');
    }

    public function search()
    {
        $data = [
            'nav' => 'oee',
            'judul' => 'OEE',
            'search' => $this->model(Vismen_model::class)->getSearch(),
        ];
        $this->view('templates/pro_header', $data);
        $this->view('landing/hasil', $data);
        $this->view('templates/pro_footer');
    }
}

<?php

namespace MyApp\Controllers;

use Signin;
use MyApp\Core\Controller;
use MyApp\Models\Auth_model;
use MyApp\Models\Shift_model;

class Auth extends Controller
{

    public function index()
    {
        Signin::login();
        Signin::loginAdmin();
        $data['shift'] = $this->model(Shift_model::class)->getShift();
        $this->view('auth/index', $data);
    }

    public function ppic()
    {
        Signin::loginAdmin();
        $this->view('auth/ppic');
    }

    public function login()
    {
        if (!empty($_POST)) {
            $this->model(Auth_model::class)->prosesLogin($_POST);
        } else {
            header('Location:/auth/login');
        }
    }

    // proses login admin ppic
    public function admin()
    {
        if (!empty($_POST)) {
            $this->model(Auth_model::class)->prosesLoginAdmin($_POST);
        } else {
            header('Location:/auth/login-admin');
        }
    }

    public function trial()
    {
        $this->view('auth/trial');
    }

    public function logout()
    {
        Signin::logout();
        header('Location:/');
        exit;
    }
}

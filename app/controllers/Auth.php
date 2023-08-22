<?php

class Auth extends Controller
{

    public function index()
    {
        Signin::login();
        $data['shift'] = $this->model('Shift_model')->getShift();
        $this->view('auth/index', $data);
    }

    public function login()
    {
        if (!empty($_POST)) {
            $this->model('Auth_model')->prosesLogin($_POST);
        } else {
            header('Location:/auth/index');
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

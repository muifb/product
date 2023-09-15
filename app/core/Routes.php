<?php

namespace MyApp\Core;

class Routes
{
    public function __construct()
    {
        $router = new App;
        $router->setDefaultController('Auth');
        $router->setDefaultMethod('index');

        $router->get('/auth/login', ['Auth', 'index']);
        $router->post('/auth/login', ['Auth', 'login']);
        $router->get('/auth/login-admin', ['Auth', 'ppic']);
        $router->post('/auth/login-admin', ['Auth', 'admin']);
        $router->get('/auth/logout', ['Auth', 'logout']);
        $router->get('/vismen/list', ['Landing', 'vismen']);
        $router->get('/vismen/tambah', ['Landing', 'create']);
        $router->post('/vismen/tambah', ['Landing', 'store']);
        $router->get('/produksi/home', ['Home', 'index']);
        $router->get('/produksi/product', ['Product', 'index']);
        $router->get('/produksi/output', ['Output', 'index']);
        $router->get('/produksi/lost', ['Lost', 'index']);
        $router->get('/produksi/create-lost', ['Lost', 'create']);
        $router->post('/produksi/lost', ['Lost', 'store']);
        $router->get('/produksi/ok', ['Ok', 'index']);
        $router->get('/produksi/nc', ['Nc', 'index']);
        $router->get('/produksi/reject', ['Reject', 'index']);
        $router->get('/produksi/oee', ['Oee', 'index']);
        $router->post('/produksi/hasil-oee', ['Oee', 'search']);
        $router->get('/produksi/profile', ['User', 'index']);
        $router->get('/produksi/create-batch', ['Home', 'create']);
        $router->post('/produksi/create-batch', ['Home', 'store']);
        $router->post('/produksi/update-batch', ['Home', 'update']);
        $router->get('/produksi/good-receipt', ['Home', 'receipt']);
        $router->post('/produksi/good-receipt', ['Home', 'posting']);
        $router->get('/produksi/edit-receipt', ['Home', 'edit']);
        $router->post('/produksi/get-report', ['Product', 'show']);
        $router->post('/produksi/edit-receipt', ['Product', 'resend']);


        $router->run();
    }
}

<?php

namespace MyApp\Core;

use MyApp\Controllers\Auth;
use MyApp\Controllers\Home;
use MyApp\Controllers\Landing;
use MyApp\Controllers\Lost;
use MyApp\Controllers\Nc;
use MyApp\Controllers\Oee;
use MyApp\Controllers\Ok;
use MyApp\Controllers\Output;
use MyApp\Controllers\Product;
use MyApp\Controllers\Reject;
use MyApp\Controllers\User;

class Routes
{
    public function __construct()
    {
        $router = new App;
        $router->setDefaultController('Auth');
        $router->setDefaultMethod('index');
        $router->setNamespace('MyApp\Controllers');

        $router->get('/auth/login', [Auth::class, 'index']);
        $router->post('/auth/login', [Auth::class, 'login']);
        $router->get('/auth/login-admin', [Auth::class, 'ppic']);
        $router->post('/auth/login-admin', [Auth::class, 'admin']);
        $router->get('/auth/logout', [Auth::class, 'logout']);
        $router->get('/vismen/list', [Landing::class, 'vismen']);
        $router->get('/vismen/tambah', [Landing::class, 'create']);
        $router->post('/vismen/tambah', [Landing::class, 'store']);
        $router->get('/produksi/home', [Home::class, 'index']);
        $router->get('/produksi/product', [Product::class, 'index']);
        $router->get('/produksi/output', [Output::class, 'index']);
        $router->get('/produksi/lost', [Lost::class, 'index']);
        $router->get('/produksi/create-lost', [Lost::class, 'create']);
        $router->post('/produksi/lost', [Lost::class, 'store']);
        $router->get('/produksi/ok', [Ok::class, 'index']);
        $router->get('/produksi/nc', [Nc::class, 'index']);
        $router->get('/produksi/reject', [Reject::class, 'index']);
        $router->get('/produksi/oee', [Oee::class, 'index']);
        $router->post('/produksi/hasil-oee', [Oee::class, 'search']);
        // $router->post('/produksi/hasil-cetak', [Oee::class, 'print']);
        $router->get('/produksi/profile', [User::class, 'index']);
        $router->get('/produksi/create-batch', [Home::class, 'create']);
        $router->post('/produksi/create-batch', [Home::class, 'store']);
        $router->post('/produksi/update-batch', [Home::class, 'update']);
        $router->get('/produksi/good-receipt', [Home::class, 'receipt']);
        $router->post('/produksi/good-receipt', [Home::class, 'posting']);
        $router->get('/produksi/edit-receipt', [Home::class, 'edit']);
        $router->post('/produksi/get-report', [Product::class, 'show']);
        $router->post('/produksi/edit-receipt', [Product::class, 'resend']);


        $router->run();
    }
}

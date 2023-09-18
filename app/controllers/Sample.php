<?php

namespace MyApp\Controllers;

class sample
{
    private $data;
    public function __construct()
    {
        $this->data = file_get_contents(__DIR__ . '/../../example.json');
    }
    public function index()
    {
        $item = json_decode($this->data, true);
        var_dump($item[0]);
    }
    public function lost()
    {
        // echo $this->data;
        $item = json_decode($this->data, true);
        var_dump($item[1]);
    }
    public function product()
    {
        // echo $this->data;
        $item = json_decode($this->data, true);
        var_dump($item[2]);
    }
    public function report()
    {
        // echo $this->data;
        $item = json_decode($this->data, true);
        var_dump($item[3]);
    }
    public function shift()
    {
        // echo $this->data;
        $item = json_decode($this->data, true);
        var_dump($item[4]);
    }
    public function user()
    {
        // echo $this->data;
        $item = json_decode($this->data, true);
        var_dump($item[5]);
    }
    public function vismen()
    {
        // echo $this->data;
        $item = json_decode($this->data, true);
        var_dump($item[6]);
    }
}

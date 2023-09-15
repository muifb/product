<?php

use MyApp\Core\Database;

class User_model
{
    private $nama = 'Abdul Muif Bahtiar';
    private $email = 'abdulmuif.bahtiar@gmail.com';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        $about = [
            'name' => $this->nama,
            'email' => $this->email
        ];
        return $about;
    }

    public function getProfile()
    {
        $this->db->query('SELECT * FROM tb_user WHERE nik = :nik');
        $this->db->bind('nik', $_SESSION['login']['nik']);
        return $this->db->single();
    }
}

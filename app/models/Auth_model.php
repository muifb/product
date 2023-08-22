<?php

class Auth_model
{
    private $table = 'tb_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function prosesLogin($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nik = :nik');
        $this->db->bind('nik', $data['nik']);
        $hasil  =   $this->db->single();
        if ($this->db->rowCount() == 1) {
            $this->db->query('SELECT * FROM tb_shift WHERE id_shift = :id_shift');
            $this->db->bind('id_shift', $data['shift']);
            $shift = $this->db->single();
            if ($this->db->rowCount() == 1) {
                $this->db->query('SELECT * FROM tb_vismen WHERE id_product = :id_product');
                $this->db->bind('id_product', $data['noPro']);
                $pro = $this->db->single();
                if ($this->db->rowCount() == 1) {

                    Signin::setLogin($hasil['nik'], $hasil['nama'], $shift['id_shift'], $shift['kel_shift'], $pro['id_product']);
                    header('Location:/home');
                    exit;
                } else {

                    Flasher::setFlash('No. Pro ' . $data['noPro'], 'tidak ditemukan. SIlahkan masukkan yang lain.', 'danger');
                    header('Location:/auth');
                    exit;
                }
            }
        } else {
            Flasher::setFlash('NIK ' . $data['nik'], 'tidak ditemukan. SIlahkan masukkan yang lain.', 'danger');
            header('Location: /auth');
            exit;
        }
    }
}

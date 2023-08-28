<?php

class Lost_model
{
    private $table = 'tb_losttime';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function insertLost($data)
    {
        // var_dump($data);
        // die;
        $nik = $data['nik'];
        $kel_shift = $data['kel_shift'];
        $kategori_lt = $data['kategori_lt'];
        $tgl_lost = $data['tgl_lost'];
        $jam_mulai = $data['jam_mulai'];
        $jam_selesai = $data['jam_selesai'];
        $sebab_lt = $data['sebab_lt'];
        $jenis_lt = $data['jenis_lt'];
        $selisih_menit = $data['selisih_menit'];
        $selisih_jam = $data['selisih_jam'];
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (null, :nik, :kel_shift, :kategori_lt, :tgl_lost, :jam_mulai, :jam_selesai, :sebab_lt, :jenis_lt, :selisih_menit, :selisih_jam)');
        $this->db->bind('nik', $nik);
        $this->db->bind('kel_shift', $kel_shift);
        $this->db->bind('kategori_lt', $kategori_lt);
        $this->db->bind('tgl_lost', $tgl_lost);
        $this->db->bind('jam_mulai', $jam_mulai);
        $this->db->bind('jam_selesai', $jam_selesai);
        $this->db->bind('sebab_lt', $sebab_lt);
        $this->db->bind('jenis_lt', $jenis_lt);
        $this->db->bind('selisih_menit', $selisih_menit);
        $this->db->bind('selisih_jam', $selisih_jam);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

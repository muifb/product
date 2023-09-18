<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use Printer;


class Batch_model
{
    private $table = 'tb_batch';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getShift()
    {
        $this->db->query('SELECT * FROM tb_shift');
        return $this->db->resultSet();
    }

    public function getProduct()
    {
        $this->db->query('SELECT * FROM tb_product');
        return $this->db->resultSet();
    }
    public function getProductById()
    {
        $this->db->query('SELECT * FROM tb_product WHERE id_product = :id_product');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        return $this->db->single();
    }

    public function getNIK()
    {
        $this->db->query('SELECT * FROM tb_user');
        return $this->db->resultSet();
    }
    public function getBatch()
    {
        $this->db->query('SELECT * FROM tb_batch JOIN tb_vismen USING (id_product) WHERE is_post = 0 ORDER BY id_batch ASC');
        return $this->db->resultSet();
    }
    public function getKode()
    {

        $this->db->query('SELECT * FROM `tb_batch` JOIN `tb_vismen` USING (id_product) WHERE is_post = 1');
        $hasil = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $hasil;
        } else {
            $query  = "SELECT RIGHT (nm_batch, 7) as nomor FROM tb_batch ORDER BY RIGHT (nm_batch, 7) DESC LIMIT 1";
            $this->db->query($query);
            $cek = $this->db->single();
            if ($this->db->rowCount() > 0) {
                $kd = "K";
                $no = $cek['nomor'];
                $no++;
                $kode = $kd . sprintf("%08d", $no);

                return $kode;
            } else {
                $kd = "K";
                $no = 0;
                $no++;
                $kode = $kd . sprintf("%08d", $no);

                return $kode;
            }
        }
    }

    public function insertBatch($data)
    {
        $batch  = $data['inputBatch'];
        $shift  = $data['shift'];
        $nip    = $data['nip'];
        $product = $data['inputProduct'];
        $namaProduct = $data['namaProduct'];
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (null, :nm_batch, :id_shift, :nip, :id_product, CURRENT_TIMESTAMP, 0)');
        $index = 0;
        foreach ($batch as $dBatch) {
            $this->db->bind('nm_batch', $dBatch);
            $this->db->bind('id_shift', $shift[$index]);
            $this->db->bind('nip', $nip[$index]);
            $this->db->bind('id_product', $product[$index]);

            $index++;
            $this->db->execute();
        }

        Printer::setPrint($batch, $namaProduct);
        return $this->db->rowCount();
    }

    public function updateBatch($data)
    {
        $product = $data['namaProduct'];
        $batch  = $data['inputBatch'];
        $this->db->query('UPDATE tb_batch SET is_post = 2 WHERE nm_batch = :nm_batch ');
        foreach ($batch as $nm_batch) {
            $this->db->bind('nm_batch', $nm_batch);
            $this->db->execute();
        }

        Printer::setPrintIn($batch, $product);
        return $this->db->rowCount();
    }

    public function postBatch($data)
    {
        $batch  = $data['batch'];
        $matrial  = $data['matrial'];
        $start = $data['start'];
        $finish = $data['finish'];
        $status    = $data['status'];
        $angka = $data['angka'];
        $defect = $data['defect'];
        $this->db->query('INSERT INTO tb_report VALUES (null, :nm_batch, :material, :mulai_pro, :selesai_pro, :status_pro, :angka, :ket_defect)');
        $index = 0;
        foreach ($batch as $nmBatch) {
            $this->db->bind('nm_batch', $nmBatch);
            $this->db->bind('material', $matrial[$index]);
            $this->db->bind('mulai_pro', $start[$index]);
            $this->db->bind('selesai_pro', $finish[$index]);
            $this->db->bind('status_pro', $status[$index]);
            $this->db->bind('angka', $angka[$index]);
            $this->db->bind('ket_defect', $defect[$index]);

            $index++;
            $this->db->execute();
        }
        if ($this->db->rowCount() > 0) {
            $this->db->query('UPDATE tb_batch SET is_post = 1 WHERE nm_batch = :nm_batch ');
            $indexUp = 0;
            foreach ($batch as $nm_batch) {
                $this->db->bind('nm_batch', $nm_batch);
                $indexUp++;
                $this->db->execute();
            }
            return $this->db->rowCount();
        }
    }
}

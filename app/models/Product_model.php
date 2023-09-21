<?php

namespace MyApp\Models;

use MyApp\Core\Database;

class Product_model
{
    private $table = 'tb_product';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProduct()
    {
        // $this->db->query('SELECT * FROM tb_product ORDER BY id_product DESC');
        // return $this->db->resultSet();
    }

    public function count()
    {
        $this->db->query('SELECT RIGHT (nm_product, 4) as ukuran ,qty_palet as panjang FROM tb_vismen WHERE id_product = :id_product LIMIT 1');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $data = $this->db->single();
        if ($this->db->rowCount() > 0) {
            $count = round($data['ukuran'] / $data['panjang']);
            return $count;
        } else {
            return 0;
        }
    }

    public function getAllProduct()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_batch.id_product = :id_product AND tb_batch.is_post != 0 ORDER BY id_batch DESC');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        return $this->db->resultSet();
    }

    public function getProductOk()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_batch.id_product = :id_product AND tb_report.status_pro = :status_pro ORDER BY id_batch DESC');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $this->db->bind('status_pro', "OK");
        return $this->db->resultSet();
    }

    public function getProductNc()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_batch.id_product = :id_product AND tb_report.status_pro = :status_pro ORDER BY id_batch DESC');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $this->db->bind('status_pro', "NC");
        return $this->db->resultSet();
    }

    public function getProductReject()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_batch.id_product = :id_product AND tb_report.status_pro = :status_pro ORDER BY id_batch DESC');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $this->db->bind('status_pro', "Reject");
        return $this->db->resultSet();
    }

    public function getReportById($id)
    {
        // return $id;
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_report.id_report = :id_report');
        $this->db->bind('id_report', $id);
        return $this->db->single();
    }

    public function getProductById($id)
    {
        // return $id;
        // $this->db->query('SELECT * FROM tb_product WHERE id_product = :id_product');
        // $this->db->bind('id_product', $id);
        // return $this->db->single();
    }

    public function resendReportById($data)
    {
        // var_dump($data);
        $idReport = $data['modalIdReport'];
        $nmBatch = $data['modalBatch'];
        $material = $data['modalMaterial'];
        $status = $data['modalStatus'];
        $start = $data['modalStart'];
        $finish = $data['modalFinish'];
        $angka = $data['modalAngka'];
        $defect = $data['modalDefect'];
        $this->db->query('UPDATE tb_report SET nm_batch = :nm_batch, material = :material, mulai_pro = :mulai_pro, selesai_pro = :selesai_pro, status_pro = :status_pro, angka = :angka, kat_defect = :kat_defect WHERE id_report = :id_report ');
        $this->db->bind('id_report', $idReport);
        $this->db->bind('nm_batch', $nmBatch);
        $this->db->bind('material', $material);
        $this->db->bind('status_pro', $status);
        $this->db->bind('mulai_pro', $start);
        $this->db->bind('selesai_pro', $finish);
        $this->db->bind('angka', $angka);
        $this->db->bind('kat_defect', $defect);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function insertProduct($data)
    {
        // var_dump($data);
        // die;
        // $id_product = $data['id_product'];
        // $nm_product = $data['nm_product'];
        // $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:id_product, :nm_product)');
        // $this->db->bind('id_product', $id_product);
        // $this->db->bind('nm_product', $nm_product);
        // $this->db->execute();
        // return $this->db->rowCount();
    }

    public function getById()
    {
        $this->db->query('SELECT * FROM tb_batch join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $this->db->resultSet();
        $totalSemua = $this->db->rowCount();
        $this->db->query('SELECT * FROM tb_batch join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND status_pro = :ok');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $totalOk = $this->db->rowCount();
        $this->db->query('SELECT * FROM tb_batch join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND status_pro = :nc');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $totalNC = $this->db->rowCount();

        $delivered = $totalOk + $totalNC;

        $data = [
            'remain' => $totalSemua,
            'delivered' => $delivered
        ];

        return $data;
    }
}

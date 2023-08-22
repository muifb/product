<?php

class Product_model
{
    private $table = 'tb_report';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProduct()
    {
        $this->db->query('SELECT * FROM tb_product ORDER BY id_product DESC');
        return $this->db->resultSet();
    }

    public function getAllProduct()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_batch.is_post != 0 ORDER BY id_batch DESC');
        return $this->db->resultSet();
    }

    public function getProductOk()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_report.status_pro = "OK" ');
        return $this->db->resultSet();
    }

    public function getProductNc()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_report.status_pro = "NC" ');
        return $this->db->resultSet();
    }

    public function getProductReject()
    {
        $this->db->query('SELECT * FROM tb_report JOIN tb_batch USING (nm_batch) JOIN tb_vismen USING (id_product) JOIN tb_shift USING (id_shift) WHERE tb_report.status_pro = "Reject" ');
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
        $this->db->query('SELECT * FROM tb_product WHERE id_product = :id_product');
        $this->db->bind('id_product', $id);
        return $this->db->single();
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
}

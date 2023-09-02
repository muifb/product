<?php

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

    public function insertProduct($data)
    {
        // var_dump($data);
        // die;
        $id_product = $data['id_product'];
        $nm_product = $data['nm_product'];
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:id_product, :nm_product)');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('nm_product', $nm_product);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function grafik()
    {

        $this->db->query('SELECT * FROM tb_batch join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product)');
        $this->db->resultSet();
        $totalSemua = $this->db->rowCount();

        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift1');
        $this->db->bind('kel_shift1', '1%');
        $this->db->resultSet();
        $totalShift1 = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift1 AND status_pro = :ok');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $shift1Ok = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift1 AND status_pro = :nc');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $shift1Nc = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift1 AND status_pro = :reject');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('reject', 'Reject');
        $this->db->resultSet();
        $shift1Reject = $this->db->rowCount();

        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift2');
        $this->db->bind('kel_shift2', '2%');
        $this->db->resultSet();
        $totalShift2 = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift2 AND status_pro = :ok');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $shift2Ok = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift2 AND status_pro = :nc');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $shift2Nc = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift2 AND status_pro = :reject');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('reject', 'Reject');
        $this->db->resultSet();
        $shift2Reject = $this->db->rowCount();

        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift3');
        $this->db->bind('kel_shift3', '3%');
        $this->db->resultSet();
        $totalShift3 = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift3 AND status_pro = :ok');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $shift3Ok = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift3 AND status_pro = :nc');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $shift3Nc = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE kel_shift LIKE :kel_shift3 AND status_pro = :reject');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('reject', 'Reject');
        $this->db->resultSet();
        $shift3Reject = $this->db->rowCount();

        $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE kel_shift LIKE :kel_shift1 And kategori_lt = :kategori_lt');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('kategori_lt', 'LOST TIME MAINTENANCE');
        $lostTime1 = $this->db->resultSet();
        $menit1 = [];
        $jam1 = [];
        foreach ($lostTime1 as $val1) {
            $menit1[] = $val1['selisih_menit'];
            $jam1[] = $val1['selisih_jam'] * 60;
        }
        $lostMenit1 = array_sum($menit1);
        $lostJam1 = array_sum($jam1);
        $lost1 = $lostMenit1 + $lostJam1;
        $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE kel_shift LIKE :kel_shift2 And kategori_lt = :kategori_lt');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('kategori_lt', 'LOST TIME MAINTENANCE');
        $lostTime2 = $this->db->resultSet();
        $menit2 = [];
        $jam2 = [];
        foreach ($lostTime2 as $val2) {
            $menit2[] = $val2['selisih_menit'];
            $jam2[] = $val2['selisih_jam'] * 60;
        }
        $lostMenit2 = array_sum($menit2);
        $lostJam2 = array_sum($jam2);
        $lost2 = $lostMenit2 + $lostJam2;
        $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE kel_shift LIKE :kel_shift3 And kategori_lt = :kategori_lt');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('kategori_lt', 'LOST TIME MAINTENANCE');
        $lostTime3 = $this->db->resultSet();
        $menit3 = [];
        $jam3 = [];
        foreach ($lostTime3 as $val3) {
            $menit3[] = $val3['selisih_menit'];
            $jam3[] = $val3['selisih_jam'] * 60;
        }
        $lostMenit3 = array_sum($menit3);
        $lostJam3 = array_sum($jam3);
        $lost3 = $lostMenit3 + $lostJam3;

        $data = [
            'total_semua' => $totalSemua,
            'total_shift1' => $totalShift1,
            'total_shift2' => $totalShift2,
            'total_shift3' => $totalShift3,
            'shift1_ok' => $shift1Ok,
            'shift1_nc' => $shift1Nc,
            'shift1_reject' => $shift1Reject,
            'shift2_ok' => $shift2Ok,
            'shift2_nc' => $shift2Nc,
            'shift2_reject' => $shift2Reject,
            'shift3_ok' => $shift3Ok,
            'shift3_nc' => $shift3Nc,
            'shift3_reject' => $shift3Reject,
            'lost1' => $lost1,
            'lost2' => $lost2,
            'lost3' => $lost3
        ];
        return $data;
    }
}

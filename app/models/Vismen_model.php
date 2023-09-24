<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use Flasher;


class Vismen_model
{
    private $table = 'tb_vismen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getVismen()
    {
        $this->db->query('SELECT * FROM tb_vismen ORDER BY id_product DESC');
        return $this->db->resultSet();
    }

    public function getVismenById()
    {
        $this->db->query('SELECT * FROM tb_vismen WHERE id_product = :id_product');
        $this->db->bind('id_product', $_SESSION['login']['id_pro']);
        return $this->db->single();
    }

    public function insertVismen($data)
    {
        // var_dump($data);
        $pro  = $data['id_product'];
        $nm  = $data['nm_product'] . ' ' . $data['ukuran'];
        $pjg    = $data['panjang_qty'];
        $plt = $data['qty_palet'];
        $msn = $data['mesin'];
        $mtr = $data['material_numb'];
        $cst = $data['customer'];
        $start = $data['start_produksi'];
        $finish = $data['finish_produksi'];
        $deliv = $data['est_pengiriman'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_product = :id_product');
        $this->db->bind('id_product', $pro);
        $vismen = $this->db->single();
        if ($vismen > 0) {
            Flasher::setFlash('No. Pro ' . $pro, 'telah ada di vismen list.', 'danger');
            header('Location:/vismen/tambah');
            exit;
        }
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:id_product, :nm_product, :panjang_qty, :qty_palet, :mesin, :material_numb, :customer, :start_produksi, :finish_produksi, :est_pengiriman)');
        $this->db->bind('id_product', $pro);
        $this->db->bind('nm_product', $nm);
        $this->db->bind('panjang_qty', $pjg);
        $this->db->bind('qty_palet', $plt);
        $this->db->bind('mesin', $msn);
        $this->db->bind('material_numb', $mtr);
        $this->db->bind('customer', $cst);
        $this->db->bind('start_produksi', $start);
        $this->db->bind('finish_produksi', $finish);
        $this->db->bind('est_pengiriman', $deliv);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getSearch()
    {
        $start_produksi = $_POST['start_produksi'];
        $finish_produksi = $_POST['finish_produksi'];
        $mesin = $_POST['mesin'];
        $id_product = $_POST['id_product'];

        $this->db->query('SELECT * FROM tb_batch join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->resultSet();
        $totalSemua = $this->db->rowCount();

        // SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = '2001000225' AND mulai_pro BETWEEN '2023-08-21' AND '2023-08-23' AND kel_shift LIKE '2%' AND status_pro = 'OK' 

        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift1', '1%');
        $this->db->resultSet();
        $totalShift1 = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 AND status_pro = :ok');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $shift1Ok = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 AND status_pro = :nc');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $shift1Nc = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 AND status_pro = :reject');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift1', '1%');
        $this->db->bind('reject', 'Reject');
        $this->db->resultSet();
        $shift1Reject = $this->db->rowCount();

        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift2', '2%');
        $this->db->resultSet();
        $totalShift2 = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 AND status_pro = :ok');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $shift2Ok = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 AND status_pro = :nc');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $shift2Nc = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 AND status_pro = :reject');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift2', '2%');
        $this->db->bind('reject', 'Reject');
        $this->db->resultSet();
        $shift2Reject = $this->db->rowCount();

        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift3', '3%');
        $this->db->resultSet();
        $totalShift3 = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 AND status_pro = :ok');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('ok', 'OK');
        $this->db->resultSet();
        $shift3Ok = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 AND status_pro = :nc');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('nc', 'NC');
        $this->db->resultSet();
        $shift3Nc = $this->db->rowCount();
        $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 AND status_pro = :reject');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
        $this->db->bind('kel_shift3', '3%');
        $this->db->bind('reject', 'Reject');
        $this->db->resultSet();
        $shift3Reject = $this->db->rowCount();

        $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE id_product = :id_product AND tgl_lost BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 And kategori_lt = :kategori_lt');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
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
        $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE id_product = :id_product AND tgl_lost BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 And kategori_lt = :kategori_lt');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
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
        $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE id_product = :id_product AND tgl_lost BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 And kategori_lt = :kategori_lt');
        $this->db->bind('id_product', $id_product);
        $this->db->bind('start_produksi', $start_produksi . '%');
        $this->db->bind('finish_produksi', $finish_produksi . '%');
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
            'start_produksi' => $start_produksi,
            'finish_produksi' => $finish_produksi,
            'mesin' => $mesin,
            'id_product' => $id_product,
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

    // public function cetak()
    // {
    //     $start_produksi = $_POST['start_produksi'];
    //     $finish_produksi = $_POST['finish_produksi'];
    //     $mesin = $_POST['mesin'];
    //     $id_product = $_POST['id_product'];

    //     $this->db->query('SELECT * FROM tb_batch join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->resultSet();
    //     $totalSemua = $this->db->rowCount();

    //     // SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = '2001000225' AND mulai_pro BETWEEN '2023-08-21' AND '2023-08-23' AND kel_shift LIKE '2%' AND status_pro = 'OK' 

    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift1', '1%');
    //     $this->db->resultSet();
    //     $totalShift1 = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 AND status_pro = :ok');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift1', '1%');
    //     $this->db->bind('ok', 'OK');
    //     $this->db->resultSet();
    //     $shift1Ok = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 AND status_pro = :nc');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift1', '1%');
    //     $this->db->bind('nc', 'NC');
    //     $this->db->resultSet();
    //     $shift1Nc = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 AND status_pro = :reject');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift1', '1%');
    //     $this->db->bind('reject', 'Reject');
    //     $this->db->resultSet();
    //     $shift1Reject = $this->db->rowCount();

    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift2', '2%');
    //     $this->db->resultSet();
    //     $totalShift2 = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 AND status_pro = :ok');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift2', '2%');
    //     $this->db->bind('ok', 'OK');
    //     $this->db->resultSet();
    //     $shift2Ok = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 AND status_pro = :nc');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift2', '2%');
    //     $this->db->bind('nc', 'NC');
    //     $this->db->resultSet();
    //     $shift2Nc = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 AND status_pro = :reject');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift2', '2%');
    //     $this->db->bind('reject', 'Reject');
    //     $this->db->resultSet();
    //     $shift2Reject = $this->db->rowCount();

    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift3', '3%');
    //     $this->db->resultSet();
    //     $totalShift3 = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 AND status_pro = :ok');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift3', '3%');
    //     $this->db->bind('ok', 'OK');
    //     $this->db->resultSet();
    //     $shift3Ok = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 AND status_pro = :nc');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift3', '3%');
    //     $this->db->bind('nc', 'NC');
    //     $this->db->resultSet();
    //     $shift3Nc = $this->db->rowCount();
    //     $this->db->query('SELECT * FROM (tb_batch JOIN tb_shift USING(id_shift)) join tb_report USING (nm_batch) JOIN tb_vismen USING (id_product) WHERE id_product = :id_product AND mulai_pro BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 AND status_pro = :reject');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift3', '3%');
    //     $this->db->bind('reject', 'Reject');
    //     $this->db->resultSet();
    //     $shift3Reject = $this->db->rowCount();

    //     $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE id_product = :id_product AND tgl_lost BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift1 And kategori_lt = :kategori_lt');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift1', '1%');
    //     $this->db->bind('kategori_lt', 'LOST TIME MAINTENANCE');
    //     $lostTime1 = $this->db->resultSet();
    //     $menit1 = [];
    //     $jam1 = [];
    //     foreach ($lostTime1 as $val1) {
    //         $menit1[] = $val1['selisih_menit'];
    //         $jam1[] = $val1['selisih_jam'] * 60;
    //     }
    //     $lostMenit1 = array_sum($menit1);
    //     $lostJam1 = array_sum($jam1);
    //     $lost1 = $lostMenit1 + $lostJam1;
    //     $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE id_product = :id_product AND tgl_lost BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift2 And kategori_lt = :kategori_lt');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift2', '2%');
    //     $this->db->bind('kategori_lt', 'LOST TIME MAINTENANCE');
    //     $lostTime2 = $this->db->resultSet();
    //     $menit2 = [];
    //     $jam2 = [];
    //     foreach ($lostTime2 as $val2) {
    //         $menit2[] = $val2['selisih_menit'];
    //         $jam2[] = $val2['selisih_jam'] * 60;
    //     }
    //     $lostMenit2 = array_sum($menit2);
    //     $lostJam2 = array_sum($jam2);
    //     $lost2 = $lostMenit2 + $lostJam2;
    //     $this->db->query('SELECT `id_product`,`selisih_menit`,`selisih_jam` FROM `tb_losttime` WHERE id_product = :id_product AND tgl_lost BETWEEN :start_produksi AND :finish_produksi AND kel_shift LIKE :kel_shift3 And kategori_lt = :kategori_lt');
    //     $this->db->bind('id_product', $id_product);
    //     $this->db->bind('start_produksi', $start_produksi . '%');
    //     $this->db->bind('finish_produksi', $finish_produksi . '%');
    //     $this->db->bind('kel_shift3', '3%');
    //     $this->db->bind('kategori_lt', 'LOST TIME MAINTENANCE');
    //     $lostTime3 = $this->db->resultSet();
    //     $menit3 = [];
    //     $jam3 = [];
    //     foreach ($lostTime3 as $val3) {
    //         $menit3[] = $val3['selisih_menit'];
    //         $jam3[] = $val3['selisih_jam'] * 60;
    //     }
    //     $lostMenit3 = array_sum($menit3);
    //     $lostJam3 = array_sum($jam3);
    //     $lost3 = $lostMenit3 + $lostJam3;

    //     $data = [
    //         'start_produksi' => $start_produksi,
    //         'finish_produksi' => $finish_produksi,
    //         'mesin' => $mesin,
    //         'id_product' => $id_product,
    //         'total_semua' => $totalSemua,
    //         'total_shift1' => $totalShift1,
    //         'total_shift2' => $totalShift2,
    //         'total_shift3' => $totalShift3,
    //         'shift1_ok' => $shift1Ok,
    //         'shift1_nc' => $shift1Nc,
    //         'shift1_reject' => $shift1Reject,
    //         'shift2_ok' => $shift2Ok,
    //         'shift2_nc' => $shift2Nc,
    //         'shift2_reject' => $shift2Reject,
    //         'shift3_ok' => $shift3Ok,
    //         'shift3_nc' => $shift3Nc,
    //         'shift3_reject' => $shift3Reject,
    //         'lost1' => $lost1,
    //         'lost2' => $lost2,
    //         'lost3' => $lost3
    //     ];
    //     return $data;
    // }

    public function getNopro()
    {
        $query  = "SELECT RIGHT (id_product, 6) as nomor FROM tb_vismen ORDER BY RIGHT (id_product, 6) DESC LIMIT 1";
        $this->db->query($query);
        $cek = $this->db->single();
        if ($this->db->rowCount() > 0) {
            $awal = 2001;
            $no = $cek['nomor'];
            $no++;
            $kode = $awal . sprintf("%06d", $no);

            return $kode;
        } else {
            $awal = 2001;
            $no = 0;
            $no++;
            $kode = $awal . sprintf("%06d", $no);

            return $kode;
        }
    }
}

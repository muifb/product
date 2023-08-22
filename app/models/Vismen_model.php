<?php

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
        $nm  = $data['nm_product'];
        $pjg    = $data['panjang_qty'];
        $plt = $data['qty_palet'];
        $msn = $data['mesin'];
        $start = $data['start_produksi'];
        $finish = $data['finish_produksi'];
        $deliv = $data['est_pengiriman'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_product = :id_product');
        $this->db->bind('id_product', $pro);
        $vismen = $this->db->single();
        if ($vismen > 0) {
            $updatePjg = $vismen['panjang_qty'] + $pjg;
            $updatePlt = $vismen['qty_palet'] + $plt;
            $this->db->query('UPDATE ' . $this->table . ' SET panjang_qty = :panjang_qty, qty_palet = :qty_palet, mesin = :mesin, finish_produksi = :finish_produksi, est_pengiriman = :est_pengiriman WHERE id_product = :id_product ');
            $this->db->bind('id_product', $pro);
            $this->db->bind('panjang_qty', $updatePjg);
            $this->db->bind('qty_palet', $updatePlt);
            $this->db->bind('mesin', $msn);
            $this->db->bind('finish_produksi', $finish);
            $this->db->bind('est_pengiriman', $deliv);

            $this->db->execute();
            return $this->db->rowCount();
        }
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:id_product, :nm_product, :panjang_qty, :qty_palet, :mesin, :start_produksi, :finish_produksi, :est_pengiriman)');
        $this->db->bind('id_product', $pro);
        $this->db->bind('nm_product', $nm);
        $this->db->bind('panjang_qty', $pjg);
        $this->db->bind('qty_palet', $plt);
        $this->db->bind('mesin', $msn);
        $this->db->bind('start_produksi', $start);
        $this->db->bind('finish_produksi', $finish);
        $this->db->bind('est_pengiriman', $deliv);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

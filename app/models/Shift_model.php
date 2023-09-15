<?php

use MyApp\Core\Database;

class Shift_model
{
    private $table = 'tb_shift';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getShift()
    {
        $this->db->query('SELECT * FROM tb_shift ORDER BY kel_shift ASC');
        return $this->db->resultSet();
    }
}

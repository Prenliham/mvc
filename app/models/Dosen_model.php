<?php


class Dosen_model {
    private $table = "dosen";
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDosen()
    {
        $this->db->query("SELECT * FROM dosen");
        return $this->db->resultSet();
    }
}
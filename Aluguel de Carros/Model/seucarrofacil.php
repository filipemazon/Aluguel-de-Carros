<?php

namespace BD\Carro\Model;

abstract class seucarrofacil
{

    protected $conn;

    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

}

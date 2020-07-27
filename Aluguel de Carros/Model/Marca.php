<?php

namespace BD\Carro\Model;

use \PDO;
use \PDOException;

class Marca {
    
    private $N_marca;
    private $Nome;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setN_marca($value) {
        $this->N_marca = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Marca`(`nome`) VALUES(:nome)");
            $stmt->bindParam(":nome", $this->nome);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Marca` SET `nome` = :nome");
            $stmt->bindParam(":N_marca", $this->N_marca);
            $stmt->bindParam(":nome", $this->nome);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Marca` WHERE `N_marca` = :N_marca");
        $stmt->bindParam(":N_marca", $this->N_marca);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Marca` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}
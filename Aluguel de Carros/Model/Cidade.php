<?php

namespace BD\Carro\Model;

use \PDO;
use \PDOException;

class Cidade {
    
    private $idCidade;
    private $Nome;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidCidade($value) {
        $this->idCidade = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Cidade`(`nome`) VALUES(:nome)");
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
            $stmt = $this->conn->prepare("UPDATE `Cidade` SET `nome` = :nome");
            $stmt->bindParam(":idCidade", $this->idCidade);
            $stmt->bindParam(":nome", $this->nome);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Cidade` WHERE `idCidade` = :idCidade");
        $stmt->bindParam(":idCidade", $this->idCidade);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Cidade` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}
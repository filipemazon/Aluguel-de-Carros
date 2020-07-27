<?php

namespace BD\Carro\Model;

use \PDO;
use \PDOException;

class Filial {
    
    private $idFilial;
    private $Cidade_idCidade;
    private $Nome;


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setIdFilial($value) {
        $this->idFilial = $value;
    }

    function setNome($value) {
        $this->Nome = $value;
    }

    function setCidade_idCidade($value) {
        $this->Cidade_idCidade = $value;
    }



    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Filial`(`Nome`,`Cidade_idCidade`) VALUES(:Nome,:Cidade_idCidade)");
            $stmt->bindParam(":Nome", $this->Nome);
            $stmt->bindParam(":Cidade_idCidade", $this->Cidade_idCidade);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Filial` SET `Nome` = :Nome, 'Cidade_idCidade' = :Cidade_idCidade");
            $stmt->bindParam(":idFilial", $this->idFilial);
            $stmt->bindParam(":Nome", $this->Nome);
            $stmt->bindParam(":Cidade_idCidade", $this->Cidade_idCidade);



            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Filial` WHERE `idFilial` = :idFilial");
        $stmt->bindParam(":idFilial", $this->idFilial);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Filial` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}
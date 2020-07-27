<?php

namespace BD\Carro\Model;



use \PDO;
use \PDOException;

class Cliente {
    
    private $idCliente;
    private $Nome;
    private $CPF;
    private $RG;
    private $Endereco;


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidCliente($value) {
        $this->idCliente = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }

    function setCPF($value) {
        $this->CPF = $value;
    }

    function setRG($value) {
        $this->RG = $value;
    }

    function setEndereco($value) {
        $this->Endereco = $value;
    }




    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Cliente`(`nome`,`CPF`,`RG`,`Endereco`) VALUES(:nome,:CPF,:RG,:Endereco)");
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":CPF", $this->CPF);
            $stmt->bindParam(":RG", $this->RG);
            $stmt->bindParam(":Endereco", $this->Endereco);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Cliente` SET `nome` = :nome, `CPF` = :CPF, `RG` = :RG, `Endereco` = :Endereco");
            $stmt->bindParam(":idCliente", $this->idCliente);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":CPF", $this->CPF);
            $stmt->bindParam(":RG", $this->RG);
            $stmt->bindParam(":Endereco", $this->Endereco);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Cliente` WHERE `idCliente` = :idCliente");
        $stmt->bindParam(":idCliente", $this->idCliente);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Cliente` WHERE 1");
        $stmt->execute();
        return $stmt;
    }

    public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Cliente` WHERE `idCliente` = :idCliente ");
            $stmt->bindParam(":idCliente", $this->idCliente);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
}
}
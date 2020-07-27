<?php

namespace BD\Carro\Model;

use \PDO;
use \PDOException;

class TipoModelo {
    
    private $Tipo;
    private $Nome_modelo;
    private $Marca_N_marca;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setTipo($value) {
        $this->Tipo = $value;
    }

    function setNome_modelo($value) {
        $this->Nome_modelo = $value;
    }

    function Marca_N_marca($value) {
        $this->Marca_N_marca = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `TipoModelo`(`Nome_modelo`,'Marca_N_marca') VALUES(:Nome_modelo,:Marca_N_marca)");
            $stmt->bindParam(":Nome_modelo", $this->Nome_modelo);
            $stmt->bindParam(":Marca_N_marca", $this->Marca_N_marca);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `TipoModelo` SET `Nome_modelo` = :Nome_modelo, 'Marca_N_marca' = :Marca_N_marca");
            $stmt->bindParam(":Tipo", $this->Tipo);
            $stmt->bindParam(":Nome_modelo", $this->Nome_modelo);
            $stmt->bindParam(":Marca_N_marca", $this->Marca_N_marca);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `TipoModelo` WHERE `Tipo` = :Tipo");
        $stmt->bindParam(":Tipo", $this->Tipo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `TipoModelo` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}
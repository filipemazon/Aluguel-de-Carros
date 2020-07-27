<?php

namespace BD\Carro\Model;

use \PDO;
use \PDOException;

class Reserva {
    
    private $idReserva;
    private $Data_Entrega;
    private $Data_Retirada;
    private $Data_Prevista;
    private $Cliente_idCliente;
    private $Custo;
    private $Data;
    private $Moto1;
    private $Moto2;
    private $Veiculo_idVeiculo;
    private $Multa;
    private $Retirou;

    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    function setidReserva($value) {
        $this->idReserva = $value;
    }

    function setData_Entrega($value) {
        $this->Data_Entrega = $value;
    }

    function setData_Retirada($value) {
        $this->Data_Retirada = $value;
    }

    function setData_Prevista($value) {
        $this->Data_Prevista = $value;
    }

    function setCliente_idCliente($value) {
        $this->Cliente_idCliente = $value;
    }

    function setCusto($value) {
        $this->Custo = $value;
    }

    function setData($value) {
        $this->Data = $value;
    }

    function setMoto1($value) {
        $this->Moto1 = $value;
    }

    function setMoto2($value) {
        $this->Moto2 = $value;
    }

    function setVeiculo_idVeiculo($value) {
        $this->Veiculo_idVeiculo = $value;
    }

    function setMulta($value) {
        $this->Multa = $value;
    }

    function setRetirou($value) {
        $this->Multa = $value;
    }


        

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Reserva`(`Data_Retirada`,`Data_Prevista`,`Cliente_idCliente`,`Custo`,`Data`,`Moto1`,`Moto2`,`Veiculo_idVeiculo`) VALUES(:Data_Retirada,:Data_Prevista,:Cliente_idCliente,:Custo,:Data,:Moto1,:Moto2,:Veiculo_idVeiculo)");
            $stmt->bindParam(":Data_Retirada", $this->Data_Retirada);
            $stmt->bindParam(":Data_Prevista", $this->Data_Prevista);
            $stmt->bindParam(":Cliente_idCliente", $this->Cliente_idCliente);
            $stmt->bindParam(":Custo", $this->Custo);
            $stmt->bindParam(":Data", $this->Data);
            $stmt->bindParam(":Moto1", $this->Moto1);
            $stmt->bindParam(":Moto2", $this->Moto2);
            $stmt->bindParam(":Veiculo_idVeiculo", $this->Veiculo_idVeiculo);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Reserva` SET `Data_Entrega` = :Data_Entrega, `Data_Retirada` = :Data_Retirada, `Data_Prevista` = :Data_Prevista, `Cliente_idCliente` = :Cliente_idCliente, `Custo` = :Custo, `Data` = :Data, `Moto1` = :Moto1, `Moto2` = :Moto2, `Veiculo_idVeiculo` = :Veiculo_idVeiculo WHERE `idReserva` = :idReserva");
            $stmt->bindParam(":idReserva", $this->idReserva);
            $stmt->bindParam(":Data_Entrega", $this->Data_Entrega);
            $stmt->bindParam(":Data_Retirada", $this->Data_Retirada);
            $stmt->bindParam(":Data_Prevista", $this->Data_Prevista);
            $stmt->bindParam(":Cliente_idCliente", $this->Cliente_idCliente);
            $stmt->bindParam(":Custo", $this->Custo);
            $stmt->bindParam(":Data", $this->Data);
            $stmt->bindParam(":Moto1", $this->Moto1);
            $stmt->bindParam(":Moto2", $this->Moto2);
            $stmt->bindParam(":Veiculo_idVeiculo", $this->Veiculo_idVeiculo);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }


    public function efetiva(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Reserva` SET `Retirou` = :Retirou");
            $stmt->bindParam(":Retirou", $this->Retirou);

            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }







    public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Reserva` WHERE `idReserva` = :idReserva ");
            $stmt->bindParam(":idReserva", $this->idReserva);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Reserva` WHERE `idReserva` = :idReserva");
        $stmt->bindParam(":idReserva", $this->idReserva);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Reserva` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}
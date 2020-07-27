<?php

namespace BD\Carro\Model;

use \PDO;
use \PDOException;

class Veiculo {
    
    private $idVeiculo;
    private $Placa;
    private $Chassi;
    private $KM;
    private $DH;
    private $AR;
    private $Vidro;
    private $Trava;
    private $Cor;
    private $Automatico;
    private $TipoModelo_Tipo;
    private $Filial_idFilial;
    private $Disponivel;

    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    function setIdVeiculo($value) {
        $this->idVeiculo = $value;
    }

    function setPlaca($value) {
        $this->Placa = $value;
    }

    function setChassi($value) {
        $this->Chassi = $value;
    }

    function setKM($value) {
        $this->KM = $value;
    }

    function setDH($value) {
        $this->KM = $value;
    }

    function setAR($value) {
        $this->AR = $value;
    }

    function setVidro($value) {
        $this->Vidro = $value;
    }

    function setTrava($value) {
        $this->Trava = $value;
    }

    function setCor($value) {
        $this->Cor = $value;
    }

    function setAutomatico($value) {
        $this->Cor = $value;
    }

    function setTipoModelo_Tipo($value){
        $this->TipoModelo_Tipo = $value;
    }

    function setFilial_idFilial($value){
        $this->Filial_idFilial = $value;
    }

    function setDisponivel($value){
        $this->Disponivel = $value;
    }


        
    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Veiculo`(`Placa`,`Chassi`,`KM`,`DH`,`AR`,`Vidro`,`Trava`,`Cor`,`Automatico`,`TipoModelo_Tipo`,`Filial_idFilial`,`Disponivel`) VALUES(:Placa,:Chassi,:KM,:DH,:AR,:Vidro,:Trava,:Cor,:Automatico,:TipoModelo_Tipo,:Filial_idFilial,:Disponivel)");
            $stmt->bindParam(":Placa", $this->Placa);
            $stmt->bindParam(":Chassi", $this->Chassi);
            $stmt->bindParam(":KM", $this->KM);
            $stmt->bindParam(":DH", $this->DH);
            $stmt->bindParam(":AR", $this->AR);
            $stmt->bindParam(":Vidro", $this->Vidro);
            $stmt->bindParam(":Trava", $this->Trava);
            $stmt->bindParam(":Cor", $this->Cor);
            $stmt->bindParam(":Automatico", $this->Automatico);
            $stmt->bindParam(":TipoModelo_Tipo", $this->TipoModelo_Tipo);
            $stmt->bindParam(":Filial_idFilial", $this->Filial_idFilial);
            $stmt->bindParam(":Disponivel", $this->Disponivel);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Veiculo` SET `Placa` = :Placa, `Chassi` = :Chassi, `KM` = :KM, `DH` = :DH, `AR` = :AR, `Vidro` = :Vidro, `Trava` = :Trava, `Cor` = :Cor, `Automatico` = :Automatico, `TipoModelo_Tipo` = :TipoModelo_Tipo, `Filial_idFilial` = :Filial_idFilial,`Disponivel` = :Disponivel WHERE `idVeiculo` = :idVeiculo");
            $stmt->bindParam(":idVeiculo", $this->idVeiculo);
            $stmt->bindParam(":Placa", $this->Placa);
            $stmt->bindParam(":Chassi", $this->Chassi);
            $stmt->bindParam(":KM", $this->KM);
            $stmt->bindParam(":DH", $this->DH);
            $stmt->bindParam(":AR", $this->AR);
            $stmt->bindParam(":Vidro", $this->Vidro);
            $stmt->bindParam(":Trava", $this->Trava);
            $stmt->bindParam(":Cor", $this->Cor);
            $stmt->bindParam(":Automatico", $this->Automatico);
            $stmt->bindParam(":TipoModelo_Tipo", $this->TipoModelo_Tipo);
            $stmt->bindParam(":Filial_idFilial", $this->Filial_idFilial);
            $stmt->bindParam(":Disponivel", $this->Disponivel);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }

    public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Veiculo` WHERE `idVeiculo` = :idVeiculo ");
            $stmt->bindParam(":idVeiculo", $this->idVeiculo);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Veiculo` WHERE `idVeiculo` = :idVeiculo");
        $stmt->bindParam(":idVeiculo", $this->idVeiculo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Veiculo` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}


<?php

require'autoloader.php';

use BD\Carro\Model\TipoModelo;
use BD\Carro\Model\Veiculo;
use BD\Carro\Model\Filial;
use BD\Carro\Model\Cidade;


$tipoModelo = new TipoModelo();
$veiculo = new Veiculo();
$filial = new Filial();
$cidade = new Cidade();

if(isset($_POST['select'])){
	$veiculo->setTipoModelo_Tipo($_POST['TipoModelo_Tipo']);
	$veiculo->setFilial_idFilial($_POST['Filial_idFilial']);
}

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$veiculo->setPlaca($_POST['Placa']);
		$veiculo->setChassi($_POST['Chassi']);
		$veiculo->setKM($_POST['KM']);
		$veiculo->setDH($_POST['DH']);
		$veiculo->setAR($_POST['AR']);
		$veiculo->setVidro($_POST['Vidro']);
		$veiculo->setTrava($_POST['Trava']);
		$veiculo->setCor($_POST['Cor']);
		$veiculo->setAutomatico($_POST['Automatico']);
		$veiculo->setTipoModelo_Tipo($_POST['TipoModelo_Tipo']);
		$veiculo->setFilial_idFilial($_POST['Filial_idFilial']);
		$veiculo->setDisponivel($_POST['Disponivel']);
		if($veiculo->insert() == 1){
			$result = "Inserido com sucesso!";
		}else{
			$error = "Erro ao inserir, tente novamente!";
		}
	}
}
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<?php
			if (isset($result)) {
				?>
				<div class="alert alert-success">
					<?php echo $result; ?>
				</div>
				<?php
			}else if(isset($error)){
				?>
				<div class="alert alert-danger">
					<?php echo $error; ?>
				</div>
				<?php
			}
			?>

			<h2>Formulário de Cadastro - Veiculo</h2>
			<form action="cadastrarVeiculo.php" method="post" class="Veiculo" id='Veiculo'>
				<div class="form-group">	

					<label>Placa:</label>
					<input type="text" name="Placa" id="Placa" class="form-text" placeholder="Placa do veiculo" required>
					<br><label>Chassi:</label>
					<input type="text" name="Chassi" id="Chassi" class="form-text" placeholder="XXXXX" required>
					<br><label>KM Rodados:</label>
					<input type="text" name="KM" id="KM" class="form-text" placeholder="YYYYY" required>
					
					<br><label>Direção Hidraulica:</label>
					<input type="radio" name="DH" value="0"> Não
					<input type="radio" name="DH" value="1"> Sim

					<br><label>AR condicionado:</label>
					<input type="radio" name="AR" value="0"> Não
					<input type="radio" name="AR" value="1"> Sim

					<br><label>Vidro Eletrico:</label>
					<input type="radio" name="Vidro" value="0"> Não
					<input type="radio" name="Vidro" value="1"> Sim

					<br><label>Trava Automatica:</label>
					<input type="radio" name="Trava" value="0"> Não
					<input type="radio" name="Trava" value="1"> Sim

					<br><label>Cor:</label>
					<input type="text" name="Cor" id="Cor" class="form-text" placeholder="Cor" required>


					<br><label>Carro Automatico:</label>
					<input type="radio" name="Automatico" value="0"> Não
					<input type="radio" name="Automatico" value="1"> Sim

					<br><label>Carro Disponivel:</label>
					<input type="radio" name="Disponivel" value="0"> Não
					<input type="radio" name="Disponivel" value="1"> Sim

					<br><label>Modelo:</label>
					<select id="select" name="TipoModelo_Tipo" action="cadastrarVeiculo.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $tipoModelo->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->Tipo; ?>" value="<?php echo $row->Tipo; ?>"> <?php echo $row->Nome_modelo; ?>   
                         </option> 
                    <?php
                    }
                    ?>
                    </select>

                    <br><label>Filial:</label>
					<select id="select" name="Filial_idFilial" action="cadastrarVeiculo.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $filial->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idFilial; ?>" value="<?php echo $row->idFilial; ?>"> <?php echo $row->Nome; ?>   
                         </option> 
                    <?php
                    }
                    ?>
                    </select>



					

					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>

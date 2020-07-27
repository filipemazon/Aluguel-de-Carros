<?php

require'autoloader.php';

use BD\Carro\Model\Cliente;
use BD\Carro\Model\Veiculo;
use BD\Carro\Model\Reserva;
use BD\Carro\Model\Filial;
use BD\Carro\Model\TipoModelo;
use BD\Carro\Model\Cidade;

$cliente = new Cliente();
$veiculo = new Veiculo();
$reserva = new Reserva();
$filial = new Filial();
$tipoModelo = new TipoModelo();
$cidade = new Cidade();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$reserva->setData_Retirada($_POST['Data_Retirada']);
		$reserva->setData_Prevista($_POST['Data_Prevista']);
		$reserva->setCliente_idCliente($_POST['Cliente_idCliente']);
		$reserva->setCusto($_POST['Custo']);
		$reserva->setData($_POST['Data']);
		$reserva->setMoto1($_POST['Moto1']);
		$reserva->setMoto2($_POST['Moto2']);
		$reserva->setVeiculo_idVeiculo($_POST['Veiculo_idVeiculo']);
		if($reserva->insert() == 1){
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



			<h2>Formulário de Reserva de Veículo</h2>
			<form action="cadastrarReserva.php" method="post" class="reserva" id='reserva'>
				<div class="form-group">	


					<br><label>Data de Retirada:</label>
					<input type="date" name="Data_Retirada" id="Data_Retirada" placeholder="Data_Retirada" required>

					<br><label>Data Prevista de Devolução:</label>
					<input type="date" name="Data_Prevista" id="Data_Prevista" placeholder="Data_Prevista" required>

					<br><label>Cliente:</label>
                    <select id="select" name="Cliente_idCliente" action="cadastrarReserva.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $cliente->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idCliente; ?>" value="<?php echo $row->idCliente; ?>"> <?php echo $row->Nome; ?>   
                         </option> 
                    <?php
                    }
                    ?>    

                    </select>

					<br><label>Custo:</label>
					<input type="text" name="Custo" id="Custo" placeholder="Custo" required>

					<br><label>Data de Reserva:</label>
					<input type="date" name="Data" id="Data" placeholder="Data de Reserva" required>

					<br><label>Motorista 1:</label>
					<input type="text" name="Moto1" id="Moto1" placeholder="Motorista 1" required>

					<br><label>Motorista 2:</label>
					<input type="text" name="Moto2" id="Moto2" placeholder="Motorista 2" required>


					<br><label>Placa do Veiculo:</label>
                    <select id="select" name="Veiculo_idVeiculo" action="cadastrarReserva.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $veiculo->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idVeiculo; ?>" value="<?php echo $row->idVeiculo; ?>"> <?php echo $row->Placa; ?>   
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

<?php
require'autoloader.php';

use BD\Carro\Model\Filial;
use BD\Carro\Model\Cidade;
use BD\Carro\Model\Reserva;
use BD\Carro\Model\Cliente;
use BD\Carro\Model\Veiculo;

$filial = new Filial();
$cidade = new Cidade();
$reserva = new Reserva();
$cliente = new Cliente();
$veiculo = new Veiculo();

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
			<h2>Relatório de Reservas por Cliente</h2>	
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cliente</th>
						<th>Data</th>
						<th>Placa</th>



					</tr>
				</thead>
				<?php
				$stmt = $reserva->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="editarReserva.php">
								<td><?php echo $row->idReserva ;?></td>
									
									<?php
									$cliente->setIdCliente($row->Cliente_idCliente);
									$stmtCliente = $cliente->view();
								?>
								<td><?php echo $stmtCliente->Nome ;?></td>

								<td><?php echo $row->Data ;?></td>

								<?php
								$veiculo->setIdVeiculo($row->Veiculo_idVeiculo);
								$stmtVeiculo = $veiculo->view();
								?>
								<td><?php echo $stmtVeiculo->Placa ;?></td>



							</form>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
<?php
require'autoloader.php';

use BD\Carro\Model\Filial;
use BD\Carro\Model\Veiculo;
use BD\Carro\Model\TipoModelo;

$filial = new Filial();
$veiculo = new Veiculo();
$tipoModelo = new TipoModelo();


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
			<h2>Relatório de Veiculos por Filial</h2>	
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Placa</th>
						<th>Modelo</th>
						<th>Nome Filial</th>

					</tr>
				</thead>
				<?php
				$stmt = $veiculo->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="editarVeiculo.php">
								<td><?php echo $row->idVeiculo ;?></td>
								<td><?php echo $row->Placa ;?></td>

								<?php
									$tipoModelo->setTipo($row->TipoModelo_Tipo);
									$stmtTipoModelo = $tipoModelo->view();
								?>
								<td><?php echo $stmtTipoModelo->Nome_modelo ;?></td>


									<?php
									$filial->setIdFilial($row->Filial_idFilial);
									$stmtFilial = $filial->view();
								?>
								<td><?php echo $stmtFilial->Nome ;?></td>

								


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
<?php
require'autoloader.php';

use BD\Carro\Model\Cliente;


$cliente = new Cliente();


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
			<h2>Relatório de Clientes</h2>	
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Endereço</th>

					</tr>
				</thead>
				<?php
				$stmt = $cliente->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="editarCliente.php">
								<td><?php echo $row->idCliente ;?></td>
								<td><?php echo $row->Nome ;?></td>
								<td><?php echo $row->CPF ;?></td>
								<td><?php echo $row->RG ;?></td>
								<td><?php echo $row->Endereco ;?></td>

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
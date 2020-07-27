<?php
require'autoloader.php';

use BD\Carro\Model\Filial;
use BD\Carro\Model\Cidade;


$filial = new Filial();
$cidade = new Cidade();


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
			<h2>Relatório de Filiais por Cidade</h2>	
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cidade</th>
						<th>Nome Filial</th>


					</tr>
				</thead>
				<?php
				$stmt = $filial->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>
					<tbody>
						<tr>
							<form method="post" action="editarFilial.php">
								<td><?php echo $row->idFilial ;?></td>

									<?php
									$cidade->setIdCidade($row->Cidade_idCidade);
									$stmtCidade = $cidade->view();
								?>
								<td><?php echo $stmtCidade->Nome ;?></td>

								<td><?php echo $row->Nome ;?></td>


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
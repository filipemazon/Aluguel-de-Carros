<?php
require'autoloader.php';

use BD\Carro\Model\Reserva;
use BD\Carro\Model\Veiculo;
use BD\Carro\Model\Cliente;

$reserva = new Reserva();
$veiculo = new Veiculo();
$cliente = new cliente();


if(isset($_POST['efetiva'])){
		$reserva->setRetirou($_POST['Retirou']);
	if($reserva->efetiva() == 1){
		$result = "Veiculo Alugado com sucesso!";
	}else{
		$error = "Erro ao processar, tente novamente!";
	}
}



if (isset($_GET['idReserva'])) {
	$reserva->setIdReserva($_GET['idReserva']);
	$row = $reserva->view();
	if (isset($result)) {
		echo "O carro da reserva ID(" . $result . ") foi entregue.<br>";
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
			<h2>Cliente</h2>	
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

			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cliente</th>
						<th>Veiculo</th>
						<th>Data de Retirada</th>


						<th class="actions">Confirmar Aluguel</th>
					</tr>
				</thead>
				<?php
				$id = 0;
				$stmt = $reserva->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="efetivarReserva.php">

								<td class="td_idReserva"><?php echo $row->idReserva ;?></td>

								<?php
									$cliente->setIdCliente($row->Cliente_idCliente);
									$stmtCliente = $cliente->view();
								?>
								<td class="td_idCliente"><?php echo $stmtCliente->Nome ;?></td>

								<?php
									$veiculo->setIdVeiculo($row->Veiculo_idVeiculo);
									$stmtVeiculo = $veiculo->view();
								?>
								<td class="td_idVeiculo"><?php echo $stmtVeiculo->Placa ;?></td>
								
								<td class="td_Data_Retirada"><?php echo $row->Data_Retirada ;?></td>


								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idReserva_t" name="idReserva_t" value="<?php echo $row->idReserva ?>">
									<a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#edit-modal" >Alugar</a>

									
									</div>
								</td>
							</form>
						</tr>
						<?php
					}

					?>
				</tbody>
			</table>

			<!-- Modal Editar-->
			<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalLabel">Efetuar Aluguel</h4>
						</div>
						<div class="modal-content">
							<?php
							$stmt = $reserva->view();
							?>
							<form action="efetivarReserva.php" method="post" class="reserva" id='reserva'>
								<div class="form-group">	
								<br><label>Data de Retirada:</label>
								<input type="date" name="Retirou" id="Retirou" placeholder="Retirou" required>
									
									


								<button type="submit" name="efetiva" class="btn btn-success btn-sm">Alugar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
						</form>
					</div>    
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


<script>
	$(function(){
		$('a').click(function(){
			var $row = $(this).closest('tr');
			var rowID = $row.attr('class').split('_')[1];
			var Retirou =  $row.find('.td_Retirou').date();

			$('#Retirou').val(Retirou);

		});
	});

</script>

<?php
require'autoloader.php';

use BD\Carro\Model\Veiculo;
use BD\Carro\Model\Filial;

$veiculo = new Veiculo();
$filial = new Filial();


if(isset($_POST['delete'])){
	$veiculo->setIdVeiculo($_POST['idVeiculo_t']);
	if($veiculo->delete() == 1){
		$result = "Deletado com sucesso!";
	}else{
		$error = "Erro ao deletar, tente novamente!";
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
			<h2>Remover Veículo</h2>	
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
						<th>Placa</th>
						<th>Nome Filial</th>

						<th class="actions">Ações</th>
					</tr>
				</thead>
				<?php
				$id = 0;
				$stmt = $veiculo->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="removerVeiculo.php">
								<td class="td_idVeiculo"><?php echo $row->idVeiculo ;?></td>
								<td class="td_Placa"><?php echo $row->Placa ;?></td>
								<?php
									$filial->setidFilial($row->Filial_idFilial);
									$stmtFilial = $filial->view();
								?>
								<td><?php echo $stmtFilial->Nome ;?></td>

								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idVeiculo_t" name="idVeiculo_t" value="<?php echo $row->idVeiculo ?>">
									

									<button type="submit" name="delete" class="btn btn-danger btn-sm">Excluir</button>
									</div>
								</td>
							</form>
						</tr>
						<?php
					}

					?>
				</tbody>
			</table>

			


<script>
	$(function(){
		$('a').click(function(){
			var $row = $(this).closest('tr');
			var rowID = $row.attr('class').split('_')[1];
			var idVeiculo =  $row.find('.td_idVeiculo').text();
			var Filial_idFilial =  $row.find('.td_Filial_idFilial').text();

			//$('#id').val(rowID);
			$('#idVeiculo').val(idVeiculo);
			$('#Nome').val(Nome);
			$('#CPF').val(CPF);
			$('#RG').val(RG);
			$('#Endereco').val(Endereco);
			//$('#myModal').modal('show');
			//alert("Passou");
		});
	});

</script>

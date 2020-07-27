<?php
require'autoloader.php';

use BD\Carrinho\Model\Carro;
use BD\Carro\Model\Cliente;

$cliente = new Cliente();


if(isset($_POST['edit'])){
		$cliente->setNome($_POST['Nome']);
		$cliente->setCPF($_POST['CPF']);
		$cliente->setRG($_POST['RG']);
		$cliente->setEndereco($_POST['Endereco']);
	if($cliente->edit() == 1){
		$result = "Editado com sucesso!";
	}else{
		$error = "Erro ao editar, tente novamente!";
	}
}


if(isset($_POST['delete'])){
	$cliente->setIdCliente($_POST['idCliente_t']);
	if($cliente->delete() == 1){
		$result = "Deletado com sucesso!";
	}else{
		$error = "Erro ao deletar, tente novamente!";
	}
}

if (isset($_GET['idCliente'])) {
	$cliente->setIdCliente($_GET['idCliente']);
	$row = $cliente->view();
	if (isset($result)) {
		echo "O cliente ID(" . $result . ") foi editada<br>";
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
						<th>Nome</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Endereco</th>

						<th class="actions">Ações</th>
					</tr>
				</thead>
				<?php
				$id = 0;
				$stmt = $cliente->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					$id += 1;
					?>

						<tr class="<?php echo $id ?>">
							<form method="post" action="editarCliente.php">
								<td class="td_idCliente"><?php echo $row->idCliente ;?></td>
								<td class="td_Nome"><?php echo $row->Nome ;?></td>
								<td class="td_CPF"><?php echo $row->CPF ;?></td>
								<td class="td_RG"><?php echo $row->RG ;?></td>
								<td class="td_Endereco"><?php echo $row->Endereco ;?></td>

								<td class="actions">
									<div class="table-responsive">
									<input type="hidden" id="idCliente_t" name="idCliente_t" value="<?php echo $row->idCliente ?>">
									<a id="abuttontomodal" class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#edit-modal" >Editar</a>

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

			<!-- Modal Editar-->
			<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalLabel">Editar Cliente</h4>
						</div>
						<div class="modal-content">
							<?php
							$stmt = $cliente->view();
							?>
							<form action="editarCliente.php" method="post" class="cliente" id='cliente'>
								<div class="form-group">	
									<label for="nome">Nome:</label>
									<input type="text" name="Nome" id="Nome" class="form-text" value="" required>
									<br><label for="CPF">CPF:</label>
									<input type="text" name="CPF" id="CPF" class="form-text" value="" required>
									<br><label for="RG">RG:</label>
									<input type="text" name="RG" id="RG" class="form-text" value="" required>
									<br><label for="Endereco">Endereço:</label>
									<input type="text" name="Endereco" id="Endereco" class="form-text" value="" required>
									
									

								<br><input type="text" id="idCliente" name="idCliente" value="">

								<button type="submit" name="edit" class="btn btn-success btn-sm">Editar</button>
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
			var idCliente =  $row.find('.td_idCliente').text();
			var Nome =  $row.find('.td_Nome').text();
			var CPF =  $row.find('.td_CPF').text();
			var RG =  $row.find('.td_RG').text();
			var Endereco =  $row.find('.td_Endereco').text();
			//$('#id').val(rowID);
			$('#idCliente').val(idCliente);
			$('#Nome').val(Nome);
			$('#CPF').val(CPF);
			$('#RG').val(RG);
			$('#Endereco').val(Endereco);
			//$('#myModal').modal('show');
			//alert("Passou");
		});
	});

</script>

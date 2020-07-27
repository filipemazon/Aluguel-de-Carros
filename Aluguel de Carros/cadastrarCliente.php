<?php

require'autoloader.php';

use BD\Carro\Model\Cliente;

$cliente = new Cliente();


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$cliente->setNome($_POST['nome']);
		$cliente->setCPF($_POST['CPF']);
		$cliente->setRG($_POST['RG']);
		$cliente->setEndereco($_POST['Endereco']);
		if($cliente->insert() == 1){
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

			<h2>Formulário de Cadastro - Cliente</h2>
			<form action="cadastrarcliente.php" method="post" class="cliente" id='cliente'>
				<div class="form-group">	
					<label>Nome:</label>
					<input type="text" name="nome" id="nome" class="form-text" placeholder="Nome" required>
					<br><label>CPF:</label>
					<input type="text" name="CPF" id="CPF" placeholder="CPF" required>
					<br><label>RG:</label>
					<input type="text" name="RG" id="RG" placeholder="RG" required>
					<br><label>Endereço:</label>
					<input type="text" name="Endereco" id="Endereco" placeholder="Endereco" required>


                    


					<input type="hidden" name="action" value="insert">
					<br><button type="submit" value="Cadastrar" class="btn btn-success btn-sm">Cadastrar</button>
				</div>
			</form>	
		</div>
	</div>
</body>
</html>

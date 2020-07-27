<?php

require'autoloader.php';

use BD\Carro\Model\Filial;
use BD\Carro\Model\Cidade;

$Filial = new Filial();
$Cidade = new Cidade();

if(isset($_POST['select'])){
	$Filial->setCidade_idCidade($_POST['Cidade_idCidade']);
}


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case "insert":
		$Filial->setNome($_POST['nome']);
		$Filial->setCidade_idCidade($_POST['Cidade_idCidade']);
		if($Filial->insert() == 1){
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

			<h2>Formulário de Cadastro - Filial</h2>
			<form action="cadastrarfilial.php" method="post" class="filial" id='filial'>
				<div class="form-group">	
					<label>Nome:</label>
					<input type="text" name="nome" id="nome" class="form-text" placeholder="Nome" required>

					<br><label>Cidade:</label>
                    <select id="select" name="Cidade_idCidade" action="cadastrarFilial.php"> 
                    <option value="select"> Selecione </option>
                        <?php 
                        $stmt = $Cidade->index(); 
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <option id= "<?php echo $row->idCidade; ?>" value="<?php echo $row->idCidade; ?>"> <?php echo $row->Nome; ?>   
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

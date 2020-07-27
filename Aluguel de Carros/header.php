<!DOCTYPE html>
<html>
<head>
  <title>Vrum</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="css/style.css">-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/font.css">
  <link rel="stylesheet" href="fonts/font2.css">
  <link rel="stylesheet" href="fonts/font3.css">
  <link rel="stylesheet" href="fonts/font4.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="js/bootstrap.min.js">
  <link rel="stylesheet" href="js/jquery.min.js">
  <link rel="stylesheet" href="js/jquery.js">
  <link rel="stylesheet" href="js/jquery.min2.js">
  <link rel="stylesheet" href="js/bootstrap.min2.js">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
 
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
 
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">CLIENTE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastrarCliente.php">Cadastrar</a></li>
            <li><a href="editarCliente.php">Editar</a></li>
          </ul>
        </li>
         
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">RESERVA
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastrarReserva.php">Reserva</a></li>
            <li><a href="efetivarReserva.php">Efetivar</a></li>
            <li><a href="efetivarDevolucao.php">Devolução</a></li>

          </ul>
        </li>
         
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">VEÍCULO
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastrarVeiculo.php">Cadastrar</a></li>
            <li><a href="removerVeiculo.php">Remover</a></li>

          </ul>
        </li>
         
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">FILIAL
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastrarFilial.php">Cadastrar</a></li>

          </ul>
        </li>
         

         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">RELATÓRIOS
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="relatorioClientes.php">Clientes Cadastrados</a></li>
             <li><a href="relatorioFiliais.php">Filiais Cadastradas</a></li>
             <li><a href="relatorioReservas.php">Reservas Efetuadas</a></li>
             <li><a href="relatorioVeiculosFilial.php">Veiculos por Filial</a></li>

          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
</body>
</html>
<?php

  include('header.php');
?>

<!-- Container -->
<div id="band" class="container text-center">
  <h2>SEU CARRO FÁCIL</h2>
  <p>
	A empresa UseMeuCarro trabalha com o aluguel de veículos. É necessário armazenar os dados dos
clientes da empresa. Cada cliente pode fazer inúmeras reservas de veículos, onde cada reserva é feita
em uma determinada data e possui um custo para o cliente.
Também são armazenados os dados de cada veículo (como placa, n° chassi, km rodada, etc...), além
disso, é mantido um cadastro dos Tipos/Modelos de veículos (Sedan, Esportivo, SUV, etc). Cada
tipo/modelo é de uma determinada marca. Podem existir inúmeros veículos de um mesmo tipo/modelo,
mas cada carro é classificado como sendo de apenas um tipo.
Ao fazer a reserva o cliente indica em qual das filiais irá retirar o carro e em qual data isso será feito. Do
mesmo modo, ao ser devolvido é registrado o dia/hora da devolução e em qual filial o carro foi devolvido.
Caso a data de entrega seja posterior à data prevista no momento da reserva, deve ser gerada uma
multa para o cliente.
A empresa possui diversas filiais espalhadas por várias cidades. Cidades grandes podem, inclusive, ter
mais de uma filial. Todos os dados da filial são armazenados no BD. Cada veículo é de propriedade de
uma filial específica.
  </p>
</div>


</body>
</html>


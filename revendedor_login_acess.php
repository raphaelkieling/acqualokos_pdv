<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login.php');
	include('sistema/verificar_login_revendedor.php');
	include('views/head.php'); 
	$id_revendedor = $_SESSION['acesso'];
?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<br><br>
		<h1>Revisão de Pontos de Venda para Confirmação</h1>
		<?php 
			$select_l = BuscaListaidRevendedor($conexao,$id_revendedor);
			while($listas = mysqli_fetch_assoc($select_l)){
		?>
		<table class="texto-centralizado table-blue table-hover">
		<tr>
			<th colspan="9"><h3>Lista = <?= $listas['id'] ?></h3></th>
		</tr>
		<tr>
			<th>Id:</th>
			<th>Nome:</th>
			<th>Documento:</th>
			<th>Ponto de Venda:</th>
			<th>Localidade:</th>
			<th>Responsável:</th>
			<th>Revendedor:</th>
			<th>Data:</th>
			<th>Nmrº:</th>
		</tr>
		<form action="sistema/confirmacao-lista.php" method="post">
		<?php

			$select = BuscaLista($conexao,$id_revendedor,$listas['id']);
			while($dados = mysqli_fetch_assoc($select))
			{
				include("views/tabela.php");
			}
			?>
			<tr>
				<td colspan="9"><button type="submit" class="btn btn-sucesso btn-big form-controlado">Aceitar Lista</button></td>
			</form>
			</tr>	
		<?php

			} 
		?>
		</table>

	</div>
</body>
</html>

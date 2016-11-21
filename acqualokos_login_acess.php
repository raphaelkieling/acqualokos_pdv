<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login.php');
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<br><br>
		<form action="sistema/confirmacao-lista-acqua.php" method="post">
		<h1>Revisão de Pontos de Venda para Confirmação</h1>
		<table class="texto-centralizado table-blue table-hover">
			<tr>
				<th>Id:</th>
				<th>Nome:</th>
				<th>Documento:</th>
				<th>Ponto de Venda:</th>
				<th>Localidade:</th>
				<th>Responsável:</th>
				<th>Revendedor:</th>
				<th>Data:</th>
			</tr>
			<?php
			$select = BuscaListaAcqua($conexao);
			while($dados = mysqli_fetch_assoc($select)){
				include("views/tabela.php");
			}
			?>
		</table>

		<button type="submit" class="btn btn-sucesso btn-big ">Aceitar Lista</button>
		</form>
	</div>
</body>
</html>

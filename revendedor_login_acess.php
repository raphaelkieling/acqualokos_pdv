	<?php
	session_start();
	if(isset($_SESSION['acesso'])){
		$id_revendedor = $_SESSION['acesso'];

		include('views/head.php');
	?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<br><br>
		<form action="confirmacao-revendedor-lista.php" method="post">
		<h1>Revisão de Pontos de Venda para Confirmação</h1>
		<table class="texto-centralizado table-blue">
			<tr>
				<th>Nome:</th>
				<th>Documento:</th>
				<th>Ponto de Venda:</th>
				<th>Localidade:</th>
				<th>Responsável:</th>
				<th>Revendedor:</th>
				<th>Data:</th>
			</tr>
			<?php
			$select = BuscaLista($conexao,$id_revendedor);
			while($dados = mysqli_fetch_assoc($select)){
			?>
			<tr>
				<td><small><?= $dados['nome']?></small></td>
				<td><small><?= $dados['documento']?></small></td>
				<td><small><?= $dados['ponto_venda']?></small></td>
				<td><small><?= $dados['localidade']?></small></td>
				<td><small><?= $dados['responsavel']?></small></td>
				<td><small><?= $dados['revendedor']?></small></td>
				<td><small><?= $dados['data']?></small></td>
			</tr>
			<?php } ?>
		</table>

		<button type="submit" class="btn btn-sucesso btn-big ">Aceitar Lista</button>
	</div>
</body>
<?php } ?>
</html>

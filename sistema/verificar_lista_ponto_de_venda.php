
<?php

	//	$ultimo = PegarIdUltimoListaRevendedor($conexao);  
	//	verificar_lista_ponto_de_venda.php?nmr_lista=
	include('conexao.php');
	$id_lista = $_GET['nmr_lista'];
?>
<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h1>Lista</h1>
			<table class="table table-bordered table-striped">
				<tr>
					<th>Nome</th>
					<th>Documento</th>
					<th>Ponto de Venda</th>
					<th>Revendedor</th>
				</tr>
			<?php  
			$select = BuscaListaPDV($conexao,$id_lista);
			while($lista = mysqli_fetch_assoc($select))
			{
			?>
				<tr>
					<td><?= $lista['nome']  ?></td>
					<td><?= $lista['documento']  ?></td>
					<td><?= $lista['ponto_venda']  ?></td>
					<td><?= $lista['nomer']  ?></td>
				</tr>
			<?php
				}
			?>
			</table>
		</div>
	</body>
</html>
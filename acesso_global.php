	<?php include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<table class="texto-centralizado table-blue table-hover">
			<tr><td colspan="8"><input type="text" id="pesquisa-geral" class="form-controlado" placeholder="Pesquisa Geral"></td></tr>
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
			$select = BuscaListaGlobal($conexao);
			while($dados = mysqli_fetch_assoc($select)){
				include("views/tabela.php");
			}
			?>
		</table>
	</div>

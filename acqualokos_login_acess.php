<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_acqua.php');
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
		<?php 
			$select_l = BuscaListaid($conexao);
			while($listas = mysqli_fetch_assoc($select_l)){
		?>
		<div class="table-responsive">
			<table class="texto-centralizado table-blue table-hover">
			<tr>
				<th colspan="9"><h3 class="text-center">Lista <?= $listas['id'] ?> - <?= $listas['nomer'] ?> - <?= $listas['p_venda'] ?></h3></th>
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
				<th>Numero Lista:</th>
			<form action="sistema/confirmacao-lista-acqua.php" method="post">
			<?php
				$contador_dados = 0;
				$select = BuscaListaAcqua($conexao,$listas['id']);
				while($dados = mysqli_fetch_assoc($select))
				{
					$contador_dados++;
					include("views/tabela.php");
				}
				if($contador_dados<=0){
					include("views/aguardo.php");
				}else{
				?>
				<tr>
					<td colspan="9"><button type="submit" class="btn btn-sucesso btn-big form-controlado">Aceitar Lista</button></td>
				</form>
				</tr>	
			<?php
				}
			}
		?>
		</table>
		</div>
	</div>
</body>
</html>

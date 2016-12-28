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
			$contador_lista = 0;
			$select_l = BuscaListaid($conexao);
			while($listas = mysqli_fetch_assoc($select_l)){
				$contador_lista++;
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><span class=" glyphicon glyphicon-list-alt text-left form-inline" arial-hidden="true"></span><center>Lista <?= $listas['id'] ?> - <?= $listas['p_venda'] ?></center></h1>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped">
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
						</tr>
					<form action="sistema/confirmacao-lista.php" method="post">
						<?php
						$contador_dados =0;
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
					</table> <!-- tabela -->
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-success btn-big form-controlado">Aceitar Lista</button>
			</div>	
				</form>
			</div> <!-- panel -->
				<?php
					}
					} 
					if($contador_lista<=0)
					{
						echo "<h2><center>Nada por enquanto...</center></h2>";
					}
				?>
		</div>
	<script src="jquery-3.1.1.js"></script>
	<script>
		$(".img-aguardo").click(function(){
			alert("Quando esta imagem aparecer significa que o acqua lokos está verificando sua lista");
		});
	</script>
</body>
</html>

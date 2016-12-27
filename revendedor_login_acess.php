<?php
	// Evita que alguma pessoa entre no site;
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
			$contador_lista = 0;
			$select_l = BuscaListaidRevendedor($conexao,$id_revendedor);
			while($listas = mysqli_fetch_assoc($select_l)){
				$contador_lista++;
		?>
		<div class="table-responsive">
			<table class="table texto-centralizado table-blue table-hover">
			<tr>
				<th colspan="9"><h3 class="text-center">Lista <?= $listas['id'] ?> - <?= $listas['p_venda'] ?></h3></th>
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
			</tr>
			<form action="sistema/confirmacao-lista.php" method="post">
			<?php
				$contador_dados =0;
				$select = BuscaLista($conexao,$id_revendedor,$listas['id']);
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
				if($contador_lista<=0)
				{
					echo "<h2><center>Nada por enquanto...</center></h2>";
				}
			?>
			</table> <!-- tabela -->
		</div> <!-- tabela responsiva -->

	</div>
	<script src="jquery-3.1.1.js"></script>
	<script>
		$(".img-aguardo").click(function(){
			alert("Quando esta imagem aparecer significa que o acqua lokos está verificando sua lista");
		});
	</script>
</body>
</html>

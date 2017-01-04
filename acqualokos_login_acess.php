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
		<h1 class="text-center">Revisão de Pontos de Venda para Confirmação</h1>
		<!-- BADGES notificação para os revendedores -->
		<?php  $notificacao = NotificacaoAcqua($conexao); ?>
		<div class="row">
			<div class="col-md-2">
				<button class="btn btn-default">Esperando <span class="badge"><?= $notificacao['esperando']?></span></button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-default">Aceitas <span class="badge"><?= $notificacao['aceita']?></span></span></button>			
			</div>
			<div class="col-md-2">
				<button class="btn btn-default">Canceladas <span class="badge"><?= $notificacao['cancelado']?></span></span></button>			
			</div>
		</div>
		<br>
		<!-- Fim Notificacoes -->
		<?php 
			$contador_lista = 0;
			$select_l = BuscaListaid($conexao);
			while($listas = mysqli_fetch_assoc($select_l)){
				$contador_lista++;
				if($listas['status'] == 0){
		?>
		<div id="<?= $listas['id']  ?>" class="panel panel-default">
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
					<form action="sistema/confirmacao-lista-acqua.php" method="post">
						<?php
						$contador_dados =0;
						$select = BuscaListaAcqua($conexao,$listas['id']);
						if($listas['status']!=2){
							while($dados = mysqli_fetch_assoc($select))
							{
								$contador_dados++;
								include("views/tabela.php");					
							}
						}
						if($contador_dados<=0){
							include("views/aguardo_acqua.php");
						}else{
						?>
					</table> <!-- tabela -->
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-success btn-big form-controlado">Aceitar Lista</button>
				<div onclick="btnCancela(<?= $listas['id'] ?>);" class="btn btn-danger form-control">Cancelar</button></div>
			</div>	
				</form>
			</div> <!-- panel -->
				<?php
							}
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
		$(".aguardo").click(function(){
			alert("Quando esta mensagem aparecer significa que o acqua lokos está verificando sua lista");
		});
		function btnCancela(numero){
			var numeroLista = numero;
			if(prompt("Digite APAGAR se quiser cancelar a lista "+numeroLista) == "APAGAR")
			{
				$.ajax({
					type:'GET',
					url:'sistema/cancelaLista.php',
					data:{lista:numeroLista},
					success:function(retorno){
						$('#'+numeroLista).animate({opacity:0.25},300,function(){
							$(this).remove();
						});
					}
				});
			}
		}
	</script>
</body>
</html>

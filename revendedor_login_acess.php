<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_revendedor.php');
	include('views/head.php'); 
	$id_revendedor = $_SESSION['acesso'];
?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>

	<!-- Site begin -->
	<div class="container main">
		<?php include("views/erro.php");?>
		<br><br>
		<h1 class="text-center">Revisão de Pontos de Venda para Confirmação</h1>
		<?php 
			$contador_lista = 0;
			$select_l = BuscaListaidRevendedor($conexao,$id_revendedor);
			while($listas = mysqli_fetch_assoc($select_l)){
				$contador_lista++;
		?>
		<div id="<?= $listas['id'] ?>" class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><span class=" glyphicon glyphicon-list-alt text-left form-inline" arial-hidden="true"></span><center>Lista <?= $listas['id'] ?> - <?= $listas['revendedor'] ?> -  <?= $listas['p_venda'] ?></center></h1>
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
						$select = BuscaLista($conexao,$id_revendedor,$listas['id']);
						if($listas['status']!=2){
							while($dados = mysqli_fetch_assoc($select))
							{
								$contador_dados++;
								include("views/tabela.php");					
							}
						}
						if($contador_dados<=0){
							include("views/aguardo.php");
						}else{
						?>
					</table> <!-- tabela -->
				</div>
			</div>
			<div class="panel-footer">
			    <input type="text" name="revendedor" value="<?= $id_revendedor ?>" hidden>
				<button type="submit" class="btn btn-success btn-big form-controlado">Aceitar Lista</button>
				<button type="button" class="btn btn-danger btn-big form-controlado" data-toggle="modal" data-target="#ModalCancelamento">
				  Cancelar
				</button>

				<!-- Modal -->
				<div class="modal fade" id="ModalCancelamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Cancelamento da lista <?= $listas['id'] ?> - <?= $listas['p_venda']?></h4>
				      </div>
				      <div class="modal-body">
				        Tem certeza que quer cancelar? Digite 'cancelar'.
				        <input type="text" id="idCancel" class="form-control">
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				        <button type="button" onclick="btnCancela(<?= $listas['id'] ?>);" class="btn btn-danger">Salvar Alteração</button>
				      </div>
				    </div>
				  </div>
				</div><!-- Fim Modal -->
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
		$(".aguardo").click(function(){
			alert("Quando esta mensagem aparecer significa que o acqua lokos está verificando sua lista");
		});
		function btnCancela(numero){
			var numeroLista = numero;
			var idCancel    = $("#idCancel").val();
			if(idCancel == "cancelar")
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
			}else{
				alert("Não esta correto");
			}
		}
		function updateUser(id_user){
			var nome = $("#nome_user"+id_user).val();
			var documento = $("#documento_user"+id_user).val();

			$.ajax({
				type:"GET",
				url:"sistema/modificar_user_revendedor.php",
				data:{id:id_user,nome:nome,documento:documento},
				success:function(data)
				{
					n = $("#nome"+id_user);
					d = $("#documento"+id_user);

					n.val(nome);
					d.val(documento);
					 $('#updateUser'+id_user).modal('toggle');
				}
			});
		}
	</script>
</html>

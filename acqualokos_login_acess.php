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
		    <div class="col-md-1">
		        <div class="dropdown">
				  <button id="dLabel" class="btn btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				   <i class="glyphicon glyphicon-menu-hamburger"></i>
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dLabel">
				    <li class="dropdown-header">Sistemas</li>
				    <li><a href="criar-lista.php">Criar Lista</a></li>
				    <li><a href="revendedor_login.php">Revendedor</a></li>
				    <li><a href="acesso_global.php">Bilheteria</a></li>
				    <li class="dropdown-header">Administração</li>
				    <li><a href="acqualokos_log.php"><i class="glyphicon glyphicon-list-alt"></i>  Log Sistema</a></li>
				    <li><a href="admin_login.php"><i class="glyphicon glyphicon-user"></i>  Admin</a></li>
				  </ul>
				</div>
		    </div>
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
					<table class="table table-striped" id="<?= $listas['status']?>">
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
				<!-- Button trigger modal -->
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
					} 
					if($contador_lista<=0)
					{
						echo "<h2><center>Nada por enquanto...</center></h2>";
					}
				?>
		</div>

	<script src="js/acqualokos.js"></script>
</body>
</html>

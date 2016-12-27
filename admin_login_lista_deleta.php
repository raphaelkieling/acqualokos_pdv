<?php  
	include('sistema/verificar_login_admin.php');
	include('views/head.php');
	include('views/header.php'); 
?>
	<div class="container">
	<br>
	<?php include("views/erro.php");?>
	<br>
		<div class="row">
			<form action="sistema/admin/deletar_lista.php">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Listas</h1>
					</div>
					<div class="panel-body">
						<ul class="list-group">
						<?php 
							$select_l = BuscaListaid($conexao);
							while($listas = mysqli_fetch_assoc($select_l)){
						?>
							<li class="list-group-item"><?= $listas['id'] ?> - <?= $listas['revendedor'] ?> - <?= $listas['p_venda'] ?><input type="checkbox" name="l[]" value='<?= $listas['id'] ?>' style="float:right;"></li>								
						<?php
							}
						 ?>
						 </ul>
					</div>
					<div class="panel-footer">
						<button class="btn btn-danger form-control">Deletar Selecionados</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
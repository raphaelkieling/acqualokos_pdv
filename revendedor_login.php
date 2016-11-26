<?php
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<div class="login-acesso">
			<img src="img/logo-acqua.png" >
			<form action="controller-login.php" method="post">
				<select name="revendedor_nome" class="form-controlado">
					<?php 
						$select = MostrarRevendedores($conexao);
						while($nomes = mysqli_fetch_assoc($select)){ 
					?>
							<!-- Saiu do php -->
							<option value="<?= $nomes['id'];?>"><?= $nomes['nome'];?></option>
					<?php
						}
					 ?>
				</select>
				<input type="password" name="revendedor_senha" class="form-controlado" placeholder="Senha Fornecida pelo Acqua Lokos" style="margin-top:10px;">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>

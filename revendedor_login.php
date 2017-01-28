<?php
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<center><h1>Login Revendedor</h1></center>
		<div class="login-acesso col-md-5">
			<img src="img/revendedor_img.png" >
			<form action="controller-login.php" method="post">
				<select name="revendedor_nome" class="form-controlado">
					<option value=""></option>
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
				<button class="btn btn-success form-controlado">Acessar</button>
			</form>
		</div>
	</div>
	<br>
	<br>
</body>

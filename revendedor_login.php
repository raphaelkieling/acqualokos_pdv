	<?php include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<div class="login-acesso">
			<img src="img/logo-acqua.png" >
			<form action="controller-login.php" method="post">
				<select name="revendedor_nome" class="form-controlado">
					<option value="0"> Revendedor 0 </option>
					<option value="1"> Revendedor 1</option>
				</select>
				<input type="password" name="revendedor_senha" class="form-controlado" placeholder="Senha Fornecida pelo Acqua Lokos" style="margin-top:10px;">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>

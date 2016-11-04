	<?php include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<div class="login-acesso">
			<img src="img/logo-revendedor.png" >	
			<form action="controller-login.php" method="post">
				<input type="password" name="revendedor_senha" class="form-controlado" placeholder="Senha Fornecida pelo Acqua Lokos">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>
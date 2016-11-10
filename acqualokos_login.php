	<?php include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php")?>
		<div class="login-acesso">
			<img src="img/logo-revendedor.png" alt="">
			<form action="controller-login.php" method="post">
				<input type="password" name="acqua_senha" class="form-controlado" placeholder="Senha Acqua Lokos">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>
</body>

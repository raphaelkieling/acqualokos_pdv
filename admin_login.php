	<?php include('views/head.php') ?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<div class="aviso form-controlado">
			Um aviso muito legal
		</div>
		<div class="login-acesso">
			<img src="img/logo-admin.png" alt="">
			<form action="controller-login.php" method="post">
				<input type="password" name="admin_senha" class="form-controlado" placeholder="Senha do desenvolvedor">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>
</body>

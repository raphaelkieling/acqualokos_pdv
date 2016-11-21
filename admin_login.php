<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login.php');
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php');?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<div class="login-acesso">
			<img src="img/logo-admin.png" alt="">
			<form action="controller-login.php" method="post">
				<input type="password" name="admin_senha" class="form-controlado" placeholder="Senha do desenvolvedor">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>
</body>

<?php
	// Evita que alguma pessoa entre no site;
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php');?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<center><h1>Login Bilheteria</h1></center>
		<div class="login-acesso">
			<img src="img/logo-bilheteria.png" alt="">
			<form action="controller-login.php" method="post">
				<input type="password" name="global_senha" class="form-controlado" placeholder="Senha global">
				<button class="btn btn-success form-controlado">Acessar</button>
			</form>
		</div>
	</div>
	<br><br>
</body>

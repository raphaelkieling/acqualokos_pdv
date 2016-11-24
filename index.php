<?php 
session_start();
unset($_SESSION['acesso']);
unset($_SESSION['acesso-total']);
unset($_SESSION['acesso-bilheteria']);
include('views/head.php') 
?>
<body>
	<!-- Header -->
	<div class="container main">
		<?php include("views/erro.php");?>
		<h1><center>Trabalha conosco? Logue-se</center></h1>
		<div class="login-acesso">
			<img src="img/logo-acqua-lokos.png" alt="">
			<form action="controller-login.php" method="post">
				<input type="password" name="senha_total" class="form-controlado" placeholder="Senha">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
		<center style="margin-top:40px;"><small>Está com problemas? Ligue para (51) 9412-1300</small></center>
	</div>
</body>
?>
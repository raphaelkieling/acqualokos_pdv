<?php 
session_start();
	unset($_SESSION['acesso-total']);
	unset($_SESSION['acesso']);
	unset($_SESSION['acqua']);
	unset($_SESSION['admin']);
	unset($_SESSION['acesso-bilheteria']);
	unset($_SESSION['acesso-lista']);

include('views/head.php') 
?>
<body>
	<!-- Header -->
	<div class="container main">
		<?php include("views/erro.php");?>
		<h1><center>Trabalha conosco?</center></h1>
		<div class="login-acesso">
			<img src="img/logo-acqua-lokos.png" alt="">
			<form action="controller-login.php" method="post">
				<center>Adquira seu url e senha com o acqua lokos</center>
				<!-- <input type="password" name="senha_total" class="form-controlado" placeholder="Senha" readonly> -->
				<!-- <button class="btn btn-sucesso form-controlado">Acessar</button> -->
			</form>
		</div>
		<center style="margin-top:40px;"><small>Está com problemas? Ligue para (51) 9412-1300</small></center>
	</div>
</body>
?>
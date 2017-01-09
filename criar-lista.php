<?php
	// Evita que alguma pessoa entre no site;
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php');?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<center><h1>Criar Listagem de Funcionários</h1></center>
		<div class="login-acesso col-md-5">
			<img src="img/logo-lista2.png" alt="">
			<form action="controller-login.php" method="post">
				<input type="password" name="lista_senha" class="form-controlado" placeholder="Senha do Ponto de Venda">
				<button class="btn btn-sucesso form-controlado">Acessar</button>
			</form>
		</div>
	</div>
	<br><br>
</body>

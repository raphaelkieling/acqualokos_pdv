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
		<div class="row">
			<div class="login-acesso col-md-5">
				<img src="img/logo-acqua-lokos.png" alt="">
				<h4><center>Adquira seu url e senha com o acqua lokos</center></h4>
				<!-- <input type="password" name="senha_total" class="form-controlado" placeholder="Senha" readonly> -->
				<!-- <button class="btn btn-sucesso form-controlado">Acessar</button> -->

				<br><br>
				<center>Quer vir aproveitar? Verifique se você já foi aceito!</center>
				<div class="alert alert-warning">
					<p>
						Coloque CPF - RG. Caso não tenha cadastrado um desses documentos não é possível fazer a verificação, pois apenas estes são números únicos. 
					</p>
					<p>
						NOMES NÃO são verificados, pois podem ocorrer falhas ortográficas por parte do cadastrante.
					</p>
				</div>
				<input type="text" class="form-control" placeholder="CPF - RG">
				<button class="btn btn-warning form-control"><span class="glyphicon glyphicon-search"></span>Verificar Disponibilidade</button>
				<br> <br>
				<div class="alert alert-success">
					Foi aceito! Vem aproveitar!
				</div>
				<div class="alert alert-danger">
					<p>Desculpa, mas teu CPF ou RG não consta no sistema. :(</p>
					<p>Aguarde a confirmação do Revendedor!</p>
				</div>
			</div>
		</div>
		<center style="margin-top:40px;"><small>Está com problemas? Ligue para (51) 9412-1300</small></center>
		<br>
	</div>
</body>
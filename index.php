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
		<h1><center>Sistema Acqua Lokos Listas</center></h1>
		<div class="row">
			<div class="login-acesso col-md-5">
				<img src="img/logo-acqua-lokos.png" alt="">
				<!-- <input type="password" name="senha_total" class="form-controlado" placeholder="Senha" readonly> -->
				<!-- <button class="btn btn-sucesso form-controlado">Acessar</button> -->

				<br><br>
				<center><h4>Quer vir aproveitar? Verifique se você já foi aceito!</h4></center>
				<h5>Leia atentamente antes de verificar</h5>
				<div class="alert alert-info">
					<p>
						Coloque <b>CPF - RG</b>. Caso não tenha cadastrado um desses documentos não é possível fazer a verificação, pois apenas estes são números únicos. 
					</p>
					<p>
						<b>NOMES NÃO</b> são verificados, pois podem ocorrer falhas ortográficas por parte do cadastrante.
					</p>
					<p><b>IMPORTANTE! </b>- Caso seu CPF ou RG conste no sistema, não quer dizer definitivamente que você pode entrar no parque e sim que o documento está cadastrado. Pode ocorrer no momento que o ponto de venda cadastre de forma errada o nome de outra pessoa e o seu documento. PASSE na bilheteria do mesmo jeito para poder entrar e confirmar seu cadastro.</p>
				</div>
				<form action="sistema/procurarDocumento.php">
					<div class="row">
						<div class="col-md-1 col-xs-2">
							<i class="fa fa-search fa-2x" aria-hidden="true"></i>

						</div>
						<div class="col-md-11 col-xs-10">
							<input type="text" class="form-control" name="documento" id="documento" placeholder="Digite seu CPF ou RG">
						</div>
					</div>
					<button class="btn btn-warning form-control">Verificar Disponibilidade</button>
					<br> <br>
					<?php 
						if(isset($_GET['cadastrado']))
						{
							$cadastrado = $_GET['cadastrado'];
						}else{
							$cadastrado = 3;
						}

						if($cadastrado == 1)
						{ 
					?>
						<div class="alert alert-success">
							<center>A princípio você foi aceito! </center>
							<br>
							<p>
								Mas lembre-se, que caso alguem tenha sido cadastrado com seu CPF ou RG aparecerá aqui. Tenha certeza que o ponto de venda lhe cadastrou corretamente para evitar transtornos.
							</p>
						</div>
					<?php }else if($cadastrado == 0){ ?>
						<div class="alert alert-danger">
							<p>Desculpa, mas teu CPF ou RG não consta no sistema. :(</p>
							<p>Aguarde a confirmação do Revendedor!</p>
						</div>
					<?php }else{?>
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<?php } ?>
				</form>
			</div>
		</div>
		<center style="margin-top:40px;"><small>Está com problemas? Ligue para (51) 9412-1300</small></center>
		<br>
	</div>
</body>
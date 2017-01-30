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
						Coloque <b>CPF - RG - NOME</b> para verificar a disponibilidade do seu nome. Tenha certeza que o Ponto de Venda escreveu seu nome ou documento de maneira correta.
					</p>
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
					<div class="table-responsive">
						<!-- <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> -->
					</div>
				</form>
			</div>
		</div>
		<center style="margin-top:40px;"><small>Está com problemas? Ligue para (51) 9412-1300</small></center>
		<br>
	</div>
	<script src="js/jquery-3.1.1.js"></script>
	<script type='text/javascript'>
		(function(){ var widget_id = 'Al8MOHZTRG';var d=document;var w=window;function l(){
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();

		$('#documento').keyup(function(){
			var palavra = $('#documento').val();
			$.ajax({
				type: 'POST',
				url:'sistema/procurarDocumento.php',
				data:{palavra:palavra},
				beforeSend:function()
				{
					$(".table-responsive").html("<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i>");
				},
				success:function(data)
				{
					$(".table-responsive").html(data);
				}
			});
		});
	</script>
	<?php include("views/footer.php"); ?>
</body>
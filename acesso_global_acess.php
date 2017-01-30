	<?php 
	include('sistema/verificar_login_bilheteria.php');
	include('views/head.php') 
	?>
<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<h1 class="text-center">Bilheteria - Procurar </h1>
		<div class="row">
			<input type="text" id="pesquisa-geral" class="form-control" onkeyup="procurar();" placeholder="Pesquisa Geral">
		</div>

		<div class="table-responsive">
			<table id="data" class="table texto-centralizado table-blue table-hover">
			<tr>
				<th>Id:</th>
				<th>Nome:</th>
				<th>Documento:</th>
				<th>Ponto de Venda:</th>
				<th>Localidade:</th>
				<th>Responsável:</th>
				<th>Revendedor:</th>
				<th>Data:</th>
				<th>Vindas:</th>
				<th>Adicionar:</th>

			</tr>
			<tr id="fa">
				<center><i id='fa' class='fa fa-spinner fa-pulse fa-3x fa-fw'></i></center>
			</tr>
			<?php
			$select = BuscaListaGlobal($conexao);
			while($dados = mysqli_fetch_assoc($select)){
				include("views/tabela_pesquisa.php");
			}
			?>
			</table>
		</div>
		<script src="jquery-3.1.1.js"></script>
		<script>
			$("#fa").hide();
			function procurar(){
				var palavra = $("#pesquisa-geral").val();
				if(palavra.length>0)
				{
					$.ajax({
						type:"GET",
						url:"views/tabela_pesquisa_procura.php",
						data:{palavra:palavra},
						beforeSend:function(){
							$(".tabela-global").hide();
							$("#fa").show();
						},
						success:function(data)
						{
							$("#fa").hide();
							$(".tabela-global").hide();
							$("#data").append(data);
						}
					});
				}else{
					$("#fa").hide();
					$(".dado-gerado").remove();
					$(".tabela-global").show();
				}
			}
		</script>
		<script src="js/j_chat.js"></script>
	</div>

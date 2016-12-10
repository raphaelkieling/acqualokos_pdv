	<?php 
	include('sistema/verificar_login_bilheteria.php');
	include('views/head.php') 
	?>

<body>
	<!-- Header -->
	<?php include('views/header.php') ?>
	<div class="container main">
		<input type="text" id="pesquisa-geral" class="form-control" onkeyup="procurar();" placeholder="Pesquisa Geral">
		<div class="table-responsive">
			<table id="data" class="table table-bordered texto-centralizado table-blue table-hover">
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
			function procurar(){
				var palavra = $("#pesquisa-geral").val();
				if(palavra.length>0)
				{
					$.ajax({
						type:"GET",
						url:"views/tabela_pesquisa_procura.php",
						data:{palavra:palavra},
						success:function(data)
						{
							$(".tabela-global").hide();
							$("#data").append(data);
						}
					});
				}else{
					$(".dado-gerado").remove();
					$(".tabela-global").show();
				}
			}
		</script>
	</div>
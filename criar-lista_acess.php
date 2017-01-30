
<?php
	// Evita que alguma pessoa entre no site;
	include('sistema/verificar_login_lista.php');
	include('views/head.php'); 
?>
<body>
	<!-- Header -->
	<?php include('views/header.php'); ?>
	<div class="container main">
		<?php include("views/erro.php");?>
		<?php if(!isset($_GET['erro-sucesso-ponto-venda'])){?>
		<br><br>
		<form action="sistema/envio-lista.php" method="post">
		<center><h1>Cadastro Ponto de Venda</h1></center>
		<p class="alert alert-warning">Preencham corretamente todo o formulário. Evite usar caractéres especias como @ & ! ' " : {} )( += = * ¨ $ #. Pois dificultará tratar os dados posteriormente. </p>
		<table>
			<tr>
				<td><br>Ponto Venda:</td>
				<td><br><input type="text" class="form-control"  required name="pontoVenda"></td>
			</tr>
			<tr>
				<td>Localidade:</td>
				<td><input type="text" class="form-control"  required name="localidade"></td>
			</tr>
			<tr>
				<td>Responsável:</td>
				<td><input type="text" class="form-control" required name="responsavel" placeholder="Responsável pelo Ponto de Venda"></td>
			</tr>
			<tr>
				<td>Revendedor:</td>
				<td>
					<select class="form-control" required name="revendedor">
						<option value="" selected></option>
					<?php 
						$select = MostrarRevendedores($conexao);
						while($nomes = mysqli_fetch_assoc($select)){ 
					?>
						<!-- Saiu do php -->
						<option value="<?= $nomes['id'];?>"><?= $nomes['nome'];?></option>
					<?php
						}
					 ?>
					</select>
				</td>
			</tr>
		</table><br><br>
		<h1>Funcionários</h1>
		<p class="alert alert-warning">Preencha com o nome e o documento do funcionário que será liberado para o parque. Evite frases muito grandes.</p>
		<table id="funcionarios-add">
			<tr>
				<th><br>Nº</th>
				<th><br>Nome:</th>
				<th><br>Documento:</th>
			</tr>
			<?php for($i=0; $i < 15 ; $i++) { ?>
			<tr>
				<td><?= $i ?></td>
				<td><input name="n[]" type="text" class="form-control" placeholder="Nome do Funcionário"></td>
				<td><input name="d[]" type="text" class="form-control" placeholder="CPF ou RG"></td>
			</tr>
			<?php } ?>
		</table>
		<br>
		<p class="alert alert-info"> Revise as informações e tenha certeza do que será cadastrado. Obrigado!</p>
		<button class="btn btn-success btn-right btn-big form-controlado" type="submit">CADASTRAR</button>
		<div class="clear"></div>
		</form>
		<?php } ?>
	</div>
	<br>
	<script src="js/j_chat.js"></script>
</body>
</html>
